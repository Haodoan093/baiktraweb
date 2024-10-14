<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []); // Lấy giỏ hàng từ session
        return view('checkout.index', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        // Validate thông tin khách hàng
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15', // Kiểm tra lại xác thực
        ]);

        // Kiểm tra giá trị của phone
        //dd($request->phone); // Kiểm tra giá trị của số điện thoại

        // Tính tổng giá trị đơn hàng
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['gia'] * $item['quantity'];
        }

        // Tạo đơn hàng
        $order = Order::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone, // Đảm bảo rằng số điện thoại được gửi đúng
            'total_price' => $total,
        ]);

        // Lưu chi tiết đơn hàng vào bảng order_details
        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'sach_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['gia'],
            ]);
        }

        // Xóa giỏ hàng sau khi thanh toán
        session()->forget('cart');

        // Chuyển hướng về trang danh sách sách với thông báo thành công
        return redirect()->route('sach.index')->with('success', 'Đơn hàng đã được đặt thành công!');
    }
}
