<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageTypeRequest extends FormRequest
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
            'name' => 'required|min:1|max:255|unique:image_types,name'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Tên thể loại không được bỏ trống .',
            'min' => 'Tên thể loại không đước ngắn hơn 1 ký tự .',
            'max' => 'Tên thể loại không đước dài hơn 255 ký tự .',
            'unique' => 'Tên thể loại đã tồn tại .'
        ];
    }
}
