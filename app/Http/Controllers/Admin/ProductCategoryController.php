<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategoryStoreRequest;
use App\Http\Requests\Admin\ProductCategoryUpdateRequest;
use App\Models\ProductCategoryTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function list(Request $request ){
        // $result = DB::select('SELECT count(*) as count FROM product_category_test');
        // $totalItems = $result[0]->count;
        // $itemPerpage = 2;
        // $totalPages = (int)ceil($totalItems / $itemPerpage);

        // $page =$request->page ?? 1;
        // $offset = ($page - 1) * $itemPerpage;

        // $datas = DB::select('SELECT * FROM product_category_test ORDER BY created_at DESC LIMIT ?,?', [$offset, $itemPerpage]);
        $keyword = $request->search ?? '';
        $sort =$request->sort ?? '';

        $array = ['id', 'desc'];
        if ($sort ==='oldest') {
            $array = ['id', 'asc'];
        }

        [$column, $sort] = $array;

        $itemPerpage = config('itemsperpage.items_per_page', 2);
        // $datas = DB::table('product_category_test')
        // ->orderBy($column, $sort)
        // ->where('name', 'like', '%' . $keyword . '%')
        // ->paginate($itemPerpage);

        $datas = ProductCategoryTest::withTrashed()
        ->where('name', 'like', '%' . $keyword . '%')
        ->orderBy($column, $sort)
        ->paginate($itemPerpage);
        return view('admin.pages.product_category.list', ['datas' => $datas]);
    }

    public function create(){
        return view('admin.pages.product_category.create');
    }

    public function store(ProductCategoryStoreRequest $request){
        // $check = DB::insert("INSERT INTO product_category_test(id, name,slug,status,created_at) VALUES (?,?,?,?,?)", [null,$request->name,$request->slug,$request->status,null]);
        // dd($check);

        //Query Builder
        // $check = DB::table('product_category_test')->insert([
        //     'name' => $request->name,
        //     'slug' => $request->slug,
        //     'status' => $request->status,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Eloquent
        // $productCategoryTest = new ProductCategoryTest();
        // $productCategoryTest->status = $request->status;
        // $productCategoryTest->name = $request->name;
        // $productCategoryTest->slug = $request->slug;

        // $check1 = $productCategoryTest->save();

        $data = ProductCategoryTest::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);

        // dd($data);

        return redirect()->route('admin.product.category.list')
        ->with('msg', $data ? 'success' :'failed');
    }

    public function make_slug(Request $request){
        $slug = Str::slug($request->slug);
        $result = DB::select('SELECT count(*) as count FROM product_category_test WHERE slug = ?', [$slug]);

        if ($result[0]->count > 0){
            $slug .= '-' . uniqid();
        }

        return response()->json(['slug' => $slug]);
    }

    public function destroy(ProductCategoryTest $productCategory){

        $msg = $productCategory->delete() ? 'success' : 'failed';

        //flash message
        return redirect()->route('admin.product_category.list')->with('msg', $msg ? 'success' : 'failed');
    }

    public function detail(ProductCategoryTest $productCategory){
        return view('admin.pages.product_category.detail')->with('data', $productCategory);
    }

    public function update(ProductCategoryUpdateRequest $request, ProductCategoryTest $productCategory){
        $productCategory->name = $request->name;
        $productCategory->slug = $request->slug;
        $productCategory->status = $request->status;
        $check = $productCategory->save();

        return redirect()->route('admin.product_category.list')->with('msg', $check ? 'success' : 'failed');
    }

    public function restore(string $id){
        $productCategory = ProductCategoryTest::withTrashed()->findOrFail($id);
        $check = $productCategory->restore();

        return redirect()->route('admin.product_category.list')->with('msg', $check ? 'success' : 'failed');
    }
}
