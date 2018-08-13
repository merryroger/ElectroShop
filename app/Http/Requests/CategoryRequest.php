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
            'name' => 'required|unique:categories|string',
            'code' => 'required|unique:categories|alpha_dash',
            'description' => 'required|string',
            'image' => 'required|image|file'
        ];
    }

    public function messages()
    {
        return [
            'code.alpha_dash' => @trans('shop.validation.code.alpha_dash'),
            'code.required' => @trans('shop.validation.code.required'),
            'code.unique' => @trans('shop.validation.code.unique'),
            'description.required' => @trans('shop.validation.description.required'),
            'description.string' => @trans('shop.validation.description.string'),
            'image.file' => @trans('shop.validation.image.file'),
            'image.image' => @trans('shop.validation.image.image'),
            'image.required' => @trans('shop.validation.image.required'),
            'name.required' => @trans('shop.validation.name.required'),
            'name.string' => @trans('shop.validation.name.string'),
            'name.unique' => @trans('shop.validation.name.unique'),
        ];
    }
}
