@extends('layouts.app')

@section('content')
<h1>Thanh Toán</h1>

<!-- Bảng hiển thị các sản phẩm trong giỏ hàng -->
<table class="table">
    <thead>
        <tr>
        <th>Tên Sách</th>
            <th>Tên Sách</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Tổng</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach ($cart as $item)
        <tr>
        <td>{{ $item['id'] }}</td>
            <td>{{ $item['ten_sach'] }}</td>
            <td>{{ number_format($item['gia'], 2) }} VNĐ</td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ number_format($item['gia'] * $item['quantity'], 2) }} VNĐ</td>
        </tr>
        @php $total += $item['gia'] * $item['quantity']; @endphp
        @endforeach
    </tbody>
</table>

<h3>Tổng tiền: {{ number_format($total, 2) }} VNĐ</h3>

<!-- Form nhập thông tin người dùng -->
<h2>Thông Tin Khách Hàng</h2>
<form action="{{ route('checkout.placeOrder') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tên Khách Hàng:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="address">Địa Chỉ:</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="form-group">
        <label for="phone">SDT:</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>

    

    <button type="submit" class="btn btn-success">Đặt Hàng</button>
</form>
@endsection
