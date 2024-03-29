<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:categories,name',
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'Tên danh mục không được bỏ trống. ',
            'min' => 'Tên danh mục quá ngắn. ',
            'max' => 'Tên danh mục quá dài.',
            'unique' => 'Tên danh mục đã tồn tại',
        ];
    }
}
