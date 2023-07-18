<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShippingRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Payment;
use App\Models\Shipping;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    private $category;
    private $customer;
    private $shipping;
    private $payment;
    private $order;
    private $order_detail;
    public function __construct(Category $category, Customer $customer, Shipping $shipping, Payment $payment, Order $order, Order_detail $order_detail)
    {
        $this->category = $category;
        $this->customer = $customer;
        $this->shipping = $shipping;
        $this->payment = $payment;
        $this->order = $order;
        $this->order_detail = $order_detail;

    }
    public function shipping ()
    {
        $shipping = $this->shipping->where('customer_id', session()->get('customer_id'))->first();

        if($shipping) {
            return redirect()->route('payment');
        }

        $categories = $this->category->where('parent_id', 0)->get();
        $categoryLimited = $categories->take(3);
        return view('shipping.shipping', compact('categoryLimited'));
    }

    public function storeShipping (StoreShippingRequest $request)
    {
        $this->shipping->create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'note' => $request->note,
            'customer_id' => session()->get('customer_id'),
        ]);

        return redirect()->route('payment');
    }

    public function payment ()
    {
        $carts = session()->get('cart') ? session()->get('cart') : array();
        $categories = $this->category->where('parent_id', 0)->get();
        $categoryLimited = $categories->take(3);
        return view('payment.payment', compact('categoryLimited', 'carts') );
    }

    public function order (Request $request)
    {
        try {
            DB::beginTransaction();
                //insert payment
                $payment = array();
                $payment['method'] = $request->method;
                $payment['status'] = 'Đang chờ xử lý';

                $payment_id = $this->payment->create($payment)->id;

                //insert order
                $oder = array();
                $oder['customer_id'] = session()->get('customer_id');
                $oder['shipping_id'] = $this->shipping->where('customer_id', session()->get('customer_id'))->first()->id;
                $oder['payment_id'] = $payment_id;
                $oder['total'] = session()->get('total');
                $oder['status'] = 'Đang chờ xử lý';

                $oder_id = $this->order->create($oder)->id;

                //insert order detail

                foreach(session()->get('cart') as $key => $cartItem) {

                    $oder_detail = array();
                    $oder_detail['order_id'] = $oder_id;
                    $oder_detail['product_id'] = $cartItem['id'];
                    $oder_detail['product_name'] = $cartItem['name'];
                    $oder_detail['product_price'] = $cartItem['price'];
                    $oder_detail['product_sale_quantity'] = $cartItem['quantity'];;

                    $this->order_detail->create($oder_detail);
                }

                DB::commit();
                if($payment['method'] == 1) {
                    session()->forget('cart');
                    return redirect('hardcash');
                } elseif($payment['method'] == 2 ) {
                    echo 'Thanh toán qua ví điện tử';
                }
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage(). 'Line:' . $exception->getLine());
        }
    }

    public function hardcash ()
    {
        $categories = $this->category->where('parent_id', 0)->get();
        $categoryLimited = $categories->take(3);
        return view('hardcash.hardcash' , compact('categoryLimited'));
    }
}
