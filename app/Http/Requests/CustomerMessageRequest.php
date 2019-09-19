<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerMessageRequest extends FormRequest
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
            'email' => 'required|min:2|max:255|email',
            'phone' => 'required|numeric',
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống .',
            'min' => ':attribute của bạn quá ngắn .',
            'max' => ':attribute của bạn quá dài .',
            'email' => ':attribute của bạn không đúng định dạng .',
            'numeric' => ':attribute của bạn không đúng định dạng .'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên của bạn',
            'email' => 'Địa chỉ email',
            'phone' => 'Số điện thoại',
            'message' => 'Bạn chưa ghi nội dung lời nhắn kìa .'
        ];
    }
}
