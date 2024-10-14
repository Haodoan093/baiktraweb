@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Thêm Sách Mới</h2>
        <form action="{{ route('sach.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="ten_sach" class="form-label">Tên Sách</label>
                <input type="text" class="form-control" id="ten_sach" name="ten_sach" required>
            </div>
            <div class="mb-3">
                <label for="mo_ta" class="form-label">Mô Tả</label>
                <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="gia" class="form-label">Giá</label>
                <input type="number" class="form-control" id="gia" name="gia" required>
            </div>
            <div class="mb-3">
                <label for="so_luong" class="form-label">Số Lượng</label>
                <input type="number" class="form-control" id="so_luong" name="so_luong" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm Sách</button>
        </form>
    </div>
@endsection
