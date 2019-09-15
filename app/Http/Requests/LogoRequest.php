<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogoRequest extends FormRequest
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
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Tên logo không được bỏ trống',
            'min' => 'Tên logo không được ngắn hơn 1 ký tự',
            'max' => 'Tên logo không được dài hơn 255 ký tự',
            'unique' => 'Tên logo đã tồn tại'
        ];
    }
}
