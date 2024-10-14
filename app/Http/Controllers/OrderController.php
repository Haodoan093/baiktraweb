<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all(); // Lấy tất cả đơn hàng
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id); // Lấy đơn hàng theo ID
        $orderDetails = OrderDetail::where('order_id', $id)->get(); // Lấy chi tiết đơn hàng
        return view('orders.show', compact('order', 'orderDetails'));
    }
}
