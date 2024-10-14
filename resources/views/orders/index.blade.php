@extends('layouts.app')

@section('content')
<h1>Danh Sách Đơn Hàng</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Khách Hàng</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Tổng Giá</th>
            <th>Ngày Tạo</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ number_format($order->total_price, 2) }} VNĐ</td>
            <td>{{ $order->created_at }}</td>
            <td>
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Xem Chi Tiết</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
