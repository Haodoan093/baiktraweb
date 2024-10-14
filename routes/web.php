<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SachController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sach', [SachController::class, 'index'])->name('sach.index');
Route::get('/sach/create', [SachController::class, 'create'])->name('sach.create');
Route::post('/sach', [SachController::class, 'store'])->name('sach.store');



Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::get('/add-to-cart/{maSach}', [CartController::class, 'addToCart'])->name('add.to.cart');


// Route cho trang thanh toán
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');


Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
