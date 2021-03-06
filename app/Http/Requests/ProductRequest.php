<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required',
            'product_code' => 'required',
            'price' => 'required',
            'description' => 'required',
            'ingredient' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png,bmp,tiff|max:4096',
        ];
    }
}
