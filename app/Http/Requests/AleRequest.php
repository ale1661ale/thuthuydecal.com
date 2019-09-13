<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AleRequest extends FormRequest
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
            'title' => 'required|min:1|max:255|unique:ales,title',
            'key_name' => 'required|min:1|max:255|regex:/^\S*$/u',
            'image' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute không được ngắn hơn 1 ký tự',
            'max' => ':attribute không được dài hơn 255 ký tự',
            'unique' => ':attribute không được trùng tô',
            'regex' => ':attribute không đúng định dạng !!!',
            'image' => ':attribute phãi là dạng hình ảnh'
        ];
    }
    
    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'key_name' => 'key_name',
            'image' => 'Hình ảnh'
        ];
    }
}
