@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Danh Sách Sách</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã Sách</th>
                    <th>Tên Sách</th>
                    <th>Mô Tả</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sachs as $sach)
                <tr>
                    <td>{{ $sach->id }}</td>
                    <td>{{ $sach->ten_sach }}</td>
                    <td>{{ $sach->mo_ta }}</td>
                    <td>{{ $sach->gia }}</td>
                    <td>{{ $sach->so_luong }}</td>
                    <td><a href="{{ route('add.to.cart', $sach->id) }}" class="btn btn-success">Mua</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
