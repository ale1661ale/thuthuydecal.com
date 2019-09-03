<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:1|max:255',
            'quantity' => 'numeric',
            'price' => 'required|numeric',
            'promotion' => 'required|numeric',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute quá ngắn',
            'max' => ':attribute không được dài hơn 255 ký tự',
            'numeric' => ':attribute phãi là dạng số',
            'image' => ':attribute không phãi là file ảnh',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'quantity' => 'Số lượng sản phẩm',
            'price' => 'Đơn giá sản phẩm',
            'promotion' => 'Giá khuyến mãi',
            'image' => 'Hình ảnh sản phẩm',
        ];
    }
}
