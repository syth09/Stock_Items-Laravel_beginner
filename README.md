# Quản Lý Sản Phẩm (Kho Hàng) - Laravel

## Giới thiệu

Dự án **Quản lý Sản phẩm (Quản lý kho)** được xây dựng bằng Laravel Framework, thực hiện theo mô hình **MVC** và tuân thủ nghiêm ngặt các yêu cầu của bài tập.

## Yêu cầu chức năng đã hoàn thành

- Thêm sản phẩm mới (Tên, Giá, Số lượng, Danh mục)
- Hiển thị danh sách sản phẩm
- Tìm kiếm sản phẩm theo tên
- Sắp xếp theo tên (A → Z và Z → A)
- Phân trang (Pagination)
- Cập nhật thông tin sản phẩm
- Xóa sản phẩm
- Hiển thị trạng thái kho:
    - **Hết hàng** (quantity = 0)
    - **Sắp hết hàng** (quantity < 5)
    - **Còn hàng** (quantity ≥ 5)
- Validation dữ liệu đầy đủ
- Giao diện sử dụng Bootstrap 5, rõ ràng và thân thiện

## Công nghệ sử dụng

- **Laravel 12** (MVC Pattern)
- **PHP 8.2+**
- **MySQL**
- **Blade Template**
- **Bootstrap 5**
- **Eloquent ORM**
- **Form Request Validation** (tách lớp)

## Cấu trúc dự án

- **Route**: `routes/web.php`
- **Controller**: `app/Http/Controllers/ProductController.php`
- **Model**: `app/Models/Product.php`
- **Validation**: `app/Http/Requests/StoreProductRequest.php` & `UpdateProductRequest.php`
- **Views**: `resources/views/products/`
- **Migration**: `database/migrations/..._create_products_table.php`

## Hướng dẫn cài đặt & chạy dự án

### 1. Clone hoặc giải nén dự án

```bash
cd C:\xampp\htdocs
```

### 2. Cài đặt dependencies

```bash
composer install
```

### 3. Copy file môi trường

```bash
cp .env.example .env
```

### 4. Cấu hình Database

- Mở file .env và chỉnh sửa:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stock_items
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Tạo Database

- Vào phpMyAdmin tạo database tên stock_items.

### 6. Chạy Migration

```bash
php artisan migrate
```

### 7. Chạy dự án

```bash
php artisan serve
```

- Truy cập: http://127.0.0.1:8000/products

## Các chức năng chính

- Thêm sản phẩm (Có validation)
- Hiển thị danh sách (Phân trang)
- Tìm kiếm theo tên (Giữ query string)
- Sắp xếp theo tên (A -> Z / Z -> A)
- Cập nhật sản phẩm (Form edit)
- Xóa sản phẩm (Có xác nhận)
- Trạng thái kho (Hết hàng / Sắp hết hàng / Còn hàng đều có Badge màu sắc riêng biệt)
- Validation dữ liệu (Sử dụng Form Request)

## Yêu cầu quan trọng đã đáp ứng

- Không viết HTML trong Controller
- Bắt buộc sử dụng @csrf trong mọi form
- Validation được tách riêng bằng Form Request
- Code rõ ràng, dễ bảo trì, tuân thủ nguyên tắc MVC
- Giao diện sử dụng Bootstrap 5, tiêu đề có background đẹp

## Thông tin sinh viên

- Họ và tên: Tạ Tuấn Phong
- MSSV: 20220849
- Lớp: DCCNTT 13.10.5
- Môn học: PHP & Laravel - Bài 2: Quản lý Sản phẩm (Kho hàng)
