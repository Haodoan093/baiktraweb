@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2>Giỏ Hàng</h2>
        <table class="table table-bordered">
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
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['gia'] * $details['quantity']; @endphp
                        <tr>
                            <td>{{ $details['ten_sach'] }}</td>
                            <td>{{ $details['gia'] }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>{{ $details['gia'] * $details['quantity'] }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div>
            <strong>Tổng Cộng: {{ $total }}</strong>
        </div>
        <a href="{{ route('checkout') }}" class="btn btn-primary">Thanh Toán</a>
    </div>
@endsection
