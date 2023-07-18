<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    private $product;
    private $category;
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function index (Request $request)
    {
        try {
            $id = $request->id;
            $productAddToCart = $this->product->find($id);
            $cart = session()->get('cart');
            $quantity = $request->quantity ? $request->quantity : 1;
            if(isset($cart[$id])) {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
            } else {
                $cart[$id] = [
                    'id' => $productAddToCart->id,
                    'name' => $productAddToCart->name,
                    'image' => $productAddToCart->feature_image_path,
                    'price' => $productAddToCart->price,
                    'quantity' => $quantity,
                ];
            }

            session()->put(['cart' => $cart]);

            return response()->json([
                'code' => 200,
                'message' => 'Thêm sản phẩm vào giỏ hàng thành công!',
            ], 200);

        } catch (Exception $exception) {
            Log::error('message:' . $exception->getMessage() . 'line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Thêm sản phẩm vào giỏ hàng không thành công!',
            ], 500);
        }
    }

    public function showCart ()
    {
        $carts = session()->get('cart') ? session()->get('cart') : array();
        $categories = $this->category->where('parent_id', 0)->get();
        $categoryLimited = $categories->take(3);

        return view('cart.cart', compact('categoryLimited', 'carts'));
    }

    public function updateCart (Request $request) {
        try {
            $carts = session()->get('cart');

            if($request->quantity) {
                $carts[$request->id]['quantity'] = $request->quantity;

                session()->put(['cart' => $carts]);

                $carts = session()->get('cart');

                $cartView = view('cart.components.products_cart', compact('carts'))->render();
            }

            return response()->json([
                'code' => 200,
                'cartView' => $cartView,
                'message' => 'Cập nhật sản phẩm trong giỏ hàng thành công!',
            ], 200);

        } catch (Exception $exception) {
            Log::error('message:' . $exception->getMessage() . 'line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Cập nhật sản phẩm trong giỏ hàng không thành công!',
            ], 500);
        }
    }

    public function deleteCart($id) {
        try {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
            }

            session()->put([ 'cart' => $cart]);

            $carts = session()->get('cart');

            $viewCart = view('cart.components.products_cart', compact('carts'))->render();

            return response()->json([
                'code' => 200,
                'message' => 'Xóa sản phẩm trong giỏ hàng thành công!',
                'viewCart' => $viewCart,
            ], 200);
        } catch (Exception $exception) {
            Log::error('message:' . $exception->getMessage() . 'line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Xóa sản phẩm trong giỏ hàng không thành công!',
            ], 500);
        }
    }

    //update payment
    public function updatePayment (Request $request) {
        try {
            $carts = session()->get('cart');

            if($request->quantity) {
                $carts[$request->id]['quantity'] = $request->quantity;

                session()->put(['cart' => $carts]);

                $carts = session()->get('cart');

                $cartView = view('payment.components.payment_content', compact('carts'))->render();
            }

            return response()->json([
                'code' => 200,
                'cartView' => $cartView,
                'message' => 'Cập nhật sản phẩm thành công!',
            ], 200);

        } catch (Exception $exception) {
            Log::error('message:' . $exception->getMessage() . 'line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Cập nhật sản phẩm không thành công!',
            ], 500);
        }
    }

    public function deletePayment($id) {
        try {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
            }

            session()->put([ 'cart' => $cart]);

            $carts = session()->get('cart');

            $viewCart = view('payment.components.payment_content', compact('carts'))->render();

            return response()->json([
                'code' => 200,
                'message' => 'Xóa sản phẩm thành công!',
                'viewCart' => $viewCart,
            ], 200);
        } catch (Exception $exception) {
            Log::error('message:' . $exception->getMessage() . 'line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Xóa sản phẩm không thành công!',
            ], 500);
        }
    }
}
