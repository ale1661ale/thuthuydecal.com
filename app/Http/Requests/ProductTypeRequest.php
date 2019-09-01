<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductTypeRequest extends FormRequest
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
            'name' => 'required|min:2|max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Tên thể loại không được bỏ trống',
            'min' => 'Tên thể loại không được ngắn hơn 2 ký tự',
            'max' => 'Tên thể loại không được dài hơn 255 ký tự',
        ];
    }
}
