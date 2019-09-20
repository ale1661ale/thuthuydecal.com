<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'name' => 'required|min:1|max:255|unique:banners,name',
            'image' => 'image',
            'key_name' => 'required|regex:/^\S*$/u'
        ];
    }

    public function messages()
    {
        return [
            'required.name' => 'Tên banner không được bỏ trống',
            'min' => 'Tên banner không được ngắn hơn 1 ký tự',
            'max' => 'Tên banner không được dài hơn 255 ký tự',
            'unique' => 'Tên banner đã tồn tại',
            'image' => 'Đây không phãi là file ảnh',
            'required.key_name' => 'Key_name không được bỏ trống',
            'regex' => 'Yêu cầu phải nhập đúng định dạng' 
        ];
    }
}
