<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:users,name',
            'email' => 'required|min:2|max:255|unique:users,email',
            'password' => 'required|max:255',
            'confirmPassword' => 'same:password',
            'avatar' => 'image',
            'address' => 'max:255'
        ];
    }

    public function attributes()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute không được ngắn hơn 2 ký tự',
            'max' => ':attribute không được dài hơn 255 ký tự',
            'unique' => ':attribute đã tồn tại',
            'same' => ':attribute không trùng với mật khẩu',
            'image' => ':attribute phãi là một file ảnh',
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Tên',
            'email' => 'Địa chỉ email',
            'password' => 'Mật khẩu',
            'confirmPassword' => ' ',
            'avatar' => 'avatar',
            'address' => 'Địa chỉ'
        ];
    }
}
