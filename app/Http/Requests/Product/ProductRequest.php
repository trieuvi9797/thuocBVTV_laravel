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
            'name' => 'required',
            'description' => 'require',
            'category_ids' => 'required',
            'price' => 'required',
            'sale' => 'required',
            'quantity' => 'required',
            'image' => 'nullable|required|image|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập vào sản phẩm',
            'image.required' => 'Hình ảnh không được bỏ trống!'
        ];
    }
}
