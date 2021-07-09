<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'profile_image' => [
                'required',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ]
        ];
    }

    public function messages()
    {
        return [
            "required" => "送信時は、必須項目です。",
            "mines" => "指定された拡張子（PNG/JPG/GIF）ではありません。",
            "max" => "2Ｍを超えています。"
        ];
    }
}
