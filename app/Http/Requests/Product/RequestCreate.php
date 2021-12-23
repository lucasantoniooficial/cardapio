<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreate extends FormRequest
{

    public function prepareForValidation()
    {
        $this->merge([
            'price' => floatval(str_replace(',','.', str_replace(['R$ ','.'],'', $this->price)))
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->hasRole('Admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'image|mimes:png,jpg',
            'code' => 'required|unique:products',
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'price' => 'valor',
            'category_id' => 'categoria',
            'code' => 'código'
        ];
    }
}
