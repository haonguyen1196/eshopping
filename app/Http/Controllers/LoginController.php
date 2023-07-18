<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\StoreLoginRequest;
use App\Models\Category;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    private $category;
    private $customer;
    public function __construct(Category $category, Customer $customer)
    {
        $this->category = $category;
        $this->customer = $customer;
    }

    public function index ()
    {
        $categories = $this->category->where('parent_id', 0)->get();
        $categoryLimited = $categories->take(3);
        return view('login.index', compact('categoryLimited'));
    }

    public function login (StoreLoginRequest $request)
    {
        $email = $request->email_login;
        $password = md5($request->password_login);

        $result = $this->customer->where('email', $email)->where('password', $password)->first();

        if ($result) {
            session()->put(['customer_id' => $result->id]);
            return redirect()->route('home');
        } else {
            session()->flash('messageLogin', 'Email hoặc mật khẩu không đúng!');
            return redirect()->route('loginPage');
        }

    }

    public function logout ()
    {
        session()->flush();
        return redirect()->route('home');
    }

    public function signUp (StoreCustomerRequest $request)
    {
        try {
            DB::beginTransaction();
            $customer = $this->customer->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => md5($request->password)
            ]);
            DB::commit();
            session()->flash('createCustomer', 'Tạo tài khoảng thành công!');
            return redirect()->route('loginPage');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage(). 'Line:' . $exception->getLine());
        }
    }
}
