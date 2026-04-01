@extends('layouts.app')

@section('content')
<div class="container">

    <div class="bg-primary text-white p-4 rounded-3 shadow-sm mb-4">
        <h1 class="mb-0 fs-3 fw-bold">Thêm Sản Phẩm Mới</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Hiển thị tất cả lỗi validation -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('products.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Danh mục</label>
                    <input type="text" name="category" class="form-control"
                           value="{{ old('category') }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Giá (VNĐ)</label>
                        <input type="number" step="0.01" name="price" class="form-control"
                               value="{{ old('price') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Số lượng tồn kho</label>
                        <input type="number" name="quantity" class="form-control"
                               value="{{ old('quantity') }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>

</div>
@endsection
