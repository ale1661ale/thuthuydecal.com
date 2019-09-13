<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentTypeRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:content_types,name',
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'Tên thể loại không được bỏ trống. ',
            'min' => 'Tên thể loại quá ngắn. ',
            'max' => 'Tên thể loại quá dài.',
            'unique' => 'Tên thể loại đã tồn tại',
        ];
    }
}
