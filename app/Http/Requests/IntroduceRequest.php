<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntroduceRequest extends FormRequest
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
            'title' => 'required|max:255',
            'image' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Tiêu đề bài viết không được bỏ trống ',
            'max' => 'Tiêu đề quá dài .',
            'image' => 'Đây phãi là một file ảnh .'
        ];
    }
}
