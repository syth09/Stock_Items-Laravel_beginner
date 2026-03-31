@extends('layouts.app')

@section('content')
<div class="container">

    <div class="bg-info text-white p-4 rounded-3 shadow-sm mb-4">
        <h1 class="mb-0 fs-3 fw-bold">Chi Tiết Sản Phẩm</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th width="200">ID</th><td>{{ $product->id }}</td></tr>
                <tr><th>Tên sản phẩm</th><td>{{ $product->name }}</td></tr>
                <tr><th>Danh mục</th><td>{{ $product->category }}</td></tr>
                <tr><th>Giá</th><td>{{ number_format($product->price) }} VNĐ</td></tr>
                <tr><th>Tồn kho</th><td class="fw-bold">{{ $product->quantity }} sản phẩm</td></tr>
                <tr><th>Trạng thái</th>
                    <td>
                        <span class="badge bg-{{ $product->stock_badge }} fs-6">
                            {{ $product->stock_status }}
                        </span>
                    </td>
                </tr>
                <tr><th>Ngày tạo</th><td>{{ $product->created_at->format('d/m/Y H:i:s') }}</td></tr>
                <tr><th>Cập nhật lần cuối</th><td>{{ $product->updated_at->format('d/m/Y H:i:s') }}</td></tr>
            </table>

            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Sửa thông tin</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
        </div>
    </div>

</div>
@endsection
