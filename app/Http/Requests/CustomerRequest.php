<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'phone' => 'required|numeric|min:6',
            'address' => 'required|min:2|max:255'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute của bạn không được bỏ trống',
            'min' => ':attribute của bạn quá ngắn',
            'max' => ':attribute của bạn quá dài',
            'numeric' => ':attribute của bạn không đúng định dạng'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ nhận hàng'
        ];
    }
}
