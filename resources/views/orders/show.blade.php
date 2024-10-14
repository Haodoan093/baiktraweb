@extends('layouts.app')

@section('content')
<h1>Chi Tiết Đơn Hàng #{{ $order->id }}</h1>

<h3>Thông Tin Khách Hàng</h3>
<p><strong>Tên:</strong> {{ $order->name }}</p>
<p><strong>Địa Chỉ:</strong> {{ $order->address }}</p>
<p><strong>Số Điện Thoại:</strong> {{ $order->phone }}</p>
<p><strong>Tổng Giá:</strong> {{ number_format($order->total_price, 2) }} VNĐ</p>
<p><strong>Ngày Tạo:</strong> {{ $order->created_at }}</p>

<h3>Chi Tiết Đơn Hàng</h3>
<table class="table">
    <thead>
        <tr>
            <th>Tên Sách</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Tổng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orderDetails as $detail)
        <tr>
            <td>{{ $detail->sach->ten_sach }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>{{ number_format($detail->price, 2) }} VNĐ</td>
            <td>{{ number_format($detail->quantity * $detail->price, 2) }} VNĐ</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
