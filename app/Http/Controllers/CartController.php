<?php

namespace App\Http\Controllers;

use App\Models\Sach;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($maSach) {
        $sach = Sach::find($maSach); // Dùng ma_sach thay vì id

        $cart = session()->get('cart', []);

        if (isset($cart[$maSach])) {
            $cart[$maSach]['quantity']++;
        } else {
            $cart[$maSach] = [
                "ten_sach" => $sach->ten_sach,
                "gia" => $sach->gia,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('sach.index')->with('success', 'Sách đã được thêm vào giỏ hàng!');
    }

    public function viewCart() {
        $cart = session()->get('cart');
        return view('cart.index', compact('cart'));
    }
}
