<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//trang-chu
Route::get('/', [HomeController::class, 'index'])->name('home');

//login
Route::get('/log-in-page', [LoginController::class, 'index'])->name('loginPage');
Route::post('/log-in', [LoginController::class, 'login'])->name('login');
Route::get('/log-out', [LoginController::class, 'logout'])->name('logout');
//sing up
Route::post('/sign-up', [LoginController::class, 'signUp'])->name('signup');


//product follow category
Route::get('/danh-muc-san-pham/{slug}/{id}', [CategoryController::class, 'index'])->name('category.products');

//product follow search input
Route::post('/search', [SearchController::class, 'index'])->name('search');

// product detail
Route::get('/chi-tiet-san-pham/{id}', [ProductDetailController::class, 'index'])->name('productDetail');

//add to cart
Route::get('/add-to-cart', [CartController::class, 'index'])->name('addToCart');

//cart page
Route::get('/carts', [CartController::class, 'showCart'])->name('cart');

//update cart
Route::get('/update-cart', [CartController::class, 'updateCart'])->name('updateCart');

//delete cart
Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])->name('deleteCart');

//checkout
Route::get('/check-out', [CheckoutController::class, 'shipping'])->name('checkout');
Route::post('/shipping', [CheckoutController::class, 'storeShipping'])->name('shipping');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');
Route::post('/order', [CheckoutController::class, 'order'])->name('order');
Route::get('/hardcash', [CheckoutController::class, 'hardcash'])->name('hardcash');

//update payment
Route::get('/update-payment', [CartController::class, 'updatePayment'])->name('updatePayment');
Route::get('/delete-payment/{id}', [CartController::class, 'deletePayment'])->name('deletePayment');


