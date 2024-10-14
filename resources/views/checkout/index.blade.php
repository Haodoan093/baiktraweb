@extends('layouts.app')

@section('content')
<h1>Thanh Toán</h1>

<table class="table">
    <thead>
        <tr>
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

<form action="{{ route('checkout.place') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">Đặt Hàng</button>
</form>
@endsection
