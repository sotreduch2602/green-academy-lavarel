<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategoryStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    public function create(){
        return view('admin.pages.product_category.create');
    }

    public function store(ProductCategoryStoreRequest $request){
        // $request->validate(
        //     [
        //         'name' => 'required|min:3|max:255',
        //         'slug' => 'required|min:3|max:255',
        //         'status' => 'required'
        //         ],
        //     [
        //         'name.min' => 'Tên danh mục phải có ít nhất 3 ký tự',
        //         'name.max' => 'Tên danh mục không được vượt quá 255 ký tự',
        //         'name.required' => 'Tên danh mục không được để trống',
        //         'slug.min' => 'Slug phải có ít nhất 3 ký tự',
        //         'slug.max' => 'Slug không được vượt quá 255 ký tự',
        //         'slug.required' => 'Slug không được để trống',
        //         'status.required' => 'Trạng thái không được để trống'
        //     ]
        // );

        //Fresh data

        $check = DB::insert("INSERT INTO product_category_test(id, name,status,created_at) VALUES (?,?,?,?)", [null,$request->name,$request->status,null]);
        // dd($check);
        return redirect()->route('admin.product.category.list')
        ->with('msg', $check ? 'success' :'failed');
    }

}
