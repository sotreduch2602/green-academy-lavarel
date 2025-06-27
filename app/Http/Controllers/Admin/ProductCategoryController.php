<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategoryStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function list(){
        $datas = DB::select('SELECT * FROM product_category_test ORDER BY created_at DESC');

        $title = 'TEST';

        return view('admin.pages.product_category.list', ['datas' => $datas , 'title' =>$title]);
    }

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

        $check = DB::insert("INSERT INTO product_category_test(id, name,slug,status,created_at) VALUES (?,?,?,?,?)", [null,$request->name,$request->slug,$request->status,null]);
        // dd($check);
        return redirect()->route('admin.product.category.list')
        ->with('msg', $check ? 'success' :'failed');
    }

    public function make_slug(Request $request){
        $slug = Str::slug($request->slug);
        $result = DB::select('SELECT count(*) as count FROM product_category_test WHERE slug = ?', [$slug]);

        if ($result[0]->count > 0){
            $slug .= '-' . uniqid();
        }

        return response()->json(['slug' => $slug]);
    }


}
