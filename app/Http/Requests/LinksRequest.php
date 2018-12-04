<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinksRequest extends FormRequest
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
            'title' => 'required|regex:/^\S{2,12}$/',
            'logo'=>'required',
            'url'=>'required',
            'desc'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'title.regex'=>'标题格式不正确',
            'logo.required'=>'请上传logo',
            'url.required'=>'网址不能为空',
            'desc.required'=>'描述不能为空'
        ];
    }
}
