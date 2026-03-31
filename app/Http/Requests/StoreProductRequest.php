<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Tên sản phẩm là bắt buộc.',
            'price.required'    => 'Giá sản phẩm là bắt buộc.',
            'quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
            'category.required' => 'Danh mục sản phẩm là bắt buộc.',
            'price.min' => 'Giá phải lớn hơn hoặc bằng 0',
            'quantity.min' => 'Số lượng không được âm',
        ];
    }
}
