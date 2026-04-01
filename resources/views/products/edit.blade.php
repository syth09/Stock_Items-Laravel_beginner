@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Tiêu đề --}}
        <div class="bg-primary text-white p-4 rounded-3 shadow-sm mb-4">
            <h1 class="mb-0 fs-3 fw-bold">Chỉnh Sửa Sản Phẩm</h1>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('products.update', $product) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}"
                            required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Danh mục</label>
                        <input type="text" name="category" class="form-control"
                            value="{{ old('category', $product->category) }}" required>
                        @error('category')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Giá (VNĐ)</label>
                            <input type="number" step="0.01" name="price" class="form-control"
                                value="{{ old('price', $product->price) }}" required>
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Số lượng tồn kho</label>
                            <input type="number" name="quantity" class="form-control"
                                value="{{ old('quantity', $product->quantity) }}" required>
                            @error('quantity')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
