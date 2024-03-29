<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'sale' => 'required|numeric|min:0|max:100',
            'quantity' => 'required',
            'image' => 'nullable|required|image|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên vào sản phẩm',
            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'image.required' => 'Hình ảnh không được bỏ trống!',
            'sale.required' => 'Vui lòng nhập giá sản phẩm',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
        ];
    }
}
