<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryUpdateRequest extends ProductCategoryStoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return
        [
            'name' => 'required|min:3|max:255|unique:product_category_test,name,'.$this->route('id'),
            'slug' => 'required|min:3|max:255',
            'status' => 'required'
        ];
    }
}
