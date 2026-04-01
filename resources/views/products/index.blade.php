@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Thông báo thành công --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Tiêu đề --}}
        <div class="bg-primary text-white p-4 rounded-3 shadow-sm mb-4">
            <h1 class="mb-0 fs-3 fw-bold">Quản Lý Sản Phẩm (Kho Hàng)</h1>
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg"></i> Thêm Sản Phẩm Mới
        </a>

        {{-- Tìm kiếm + Sắp xếp --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm..." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <select class="form-select" onchange="window.location.href=this.value">
                    <option value="{{ route('products.index') }}" {{ request('sort') == '' ? 'selected' : '' }}>Sắp xếp theo
                    </option>
                    <option value="{{ route('products.index', ['sort' => 'asc']) }}"
                        {{ request('sort') == 'asc' ? 'selected' : '' }}>Tên từ A -> Z</option>
                    <option value="{{ route('products.index', ['sort' => 'desc']) }}"
                        {{ request('sort') == 'desc' ? 'selected' : '' }}>Tên từ Z -> A</option>
                    <option value="{{ route('products.index', ['sort' => 'price']) }}"
                        {{ request('sort') == 'price' ? 'selected' : '' }}>Giá</option>
                    <option value="{{ route('products.index', ['sort' => 'name']) }}"
                        {{ request('sort') == 'name' ? 'selected' : '' }}>Tên sản phẩm</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Lọc</button>
            </div>
        </div>

        {{-- Danh sách sản phẩm --}}
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá (VNĐ)</th>
                    <th>Tồn kho</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category ?? 'Chưa có danh mục' }}</td>
                        <td class="text-end">{{ number_format($product->price, 0) }}</td>
                        <td class="text-center fw-bold">{{ $product->quantity }}</td>
                        <td>
                            <span class="badge bg-{{ $product->stock_badge }} fs-6">
                                {{ $product->stock_status }}
                            </span>
                        </td>
                        <td>{{ $product->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Chi tiết
                            </a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Sửa
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Xác nhận xóa sản phẩm này?')">
                                    <i class="bi bi-trash"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">Chưa có sản phẩm nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
