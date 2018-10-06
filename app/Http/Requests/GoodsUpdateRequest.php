<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'code' => 'required|alpha_dash',
            'description' => 'required|string',
            'image' => 'image|file',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'code.alpha_dash' => @trans('shop.validation.code.alpha_dash'),
            'code.required' => @trans('shop.validation.code.required'),
            'description.required' => @trans('shop.validation.description.required'),
            'description.string' => @trans('shop.validation.description.string'),
            'image.file' => @trans('shop.validation.image.file'),
            'image.image' => @trans('shop.validation.image.image'),
            'name.required' => @trans('shop.validation.name.required'),
            'name.string' => @trans('shop.validation.name.string'),
            'price.numeric' => @trans('shop.validation.price.numeric'),
            'price.required' => @trans('shop.validation.price.required'),
        ];
    }

}

