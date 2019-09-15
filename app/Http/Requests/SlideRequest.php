<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'name' => 'required|min:1|max:255|unique:slides,name',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Tên slide không được bỏ trống',
            'min' => 'Tên slide không được ngắn hơn 1 ký tự',
            'max' => 'Tên slide không được dài hơn 255 ký tự',
            'unique' => 'Tên slide đã tồn tại'
        ];
    }
}
