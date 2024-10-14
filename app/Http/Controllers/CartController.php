<?php

namespace App\Http\Controllers;

use App\Models\Sach;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id) {
        // Sử dụng ma_sach để tìm kiếm
        $sach = Sach::findOrFail($id); // Trả về lỗi 404 nếu không tìm thấy sách

        $cart = session()->get('cart', []);

        // Kiểm tra nếu sách đã có trong giỏ hàng
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Thêm sách mới vào giỏ hàng
            $cart[$id] = [
                "id" => $id,
                "ten_sach" => $sach->ten_sach,
                "gia" => $sach->gia,
                "quantity" => 1
            ];
        }

        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);

        return redirect()->route('sach.index')->with('success', 'Sách đã được thêm vào giỏ hàng!');
    }

    public function viewCart() {
        $cart = session()->get('cart', []); // Đảm bảo trả về mảng rỗng nếu không có giỏ hàng
        return view('cart.index', compact('cart'));
    }
}
