<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        // Xử lý logic thanh toán (giả định)
        // Có thể lưu thông tin đơn hàng vào cơ sở dữ liệu

        session()->forget('cart');  // Xóa giỏ hàng sau khi thanh toán
        return redirect()->route('sach.index')->with('success', 'Đơn hàng đã được đặt thành công!');
    }
}
