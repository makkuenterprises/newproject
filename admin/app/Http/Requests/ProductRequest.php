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
            //
            'product_name' => 'required',
            'category_id' => 'required',
            'product_description' => 'required',
            
            'discount_price' => 'numeric',
            'product_size' => 'required',
            'product_thumbnail' => 'mimes:jpeg,jpg,png',
            
        ];
    }
}
