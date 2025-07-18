<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return
        [
            'name' => 'required|min:3|max:255|unique:product_category_test,name',
            'slug' => 'required|min:3|max:255',
            'status' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.unique' => 'Tên danh mục bị trùng',
            'name.min' => 'Tên danh mục phải có ít nhất 3 ký tự',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự',
            'name.required' => 'Tên danh mục không được để trống',
            'slug.min' => 'Slug phải có ít nhất 3 ký tự',
            'slug.max' => 'Slug không được vượt quá 255 ký tự',
            'slug.required' => 'Slug không được để trống',
            'status.required' => 'Trạng thái không được để trống'
        ];
    }
}
