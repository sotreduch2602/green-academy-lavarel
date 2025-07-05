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

        $itemPerpage = config('itemsperpage.items_per_page', 2);
        // $datas = ProductCategoryTest::orderBy('created_at', "DESC")->paginate($itemPerpage);
        $datas = DB::table('product_category_test')
            ->orderBy('created_at', 'DESC')
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

    public function destroy(int $id){
        // $result = DB::delete('DELETE FROM product_category_test where id = ?', [$id]);

        //Query Builder
        // $result = DB::table('product_category_test')->where('id', $id)->delete();

        //Eloquent
        // $result = ProductCategoryTest::where('id',$id) -> delete();
        $result = ProductCategoryTest::find($id) -> delete();


        $msg = $result ? 'success' : 'fail';

        //flash message
        return redirect()->route('admin.product.category.list')->with('msg', $msg ? 'success' : 'failed');
    }

    public function detail(string $id){
        $data = DB::select('select * from product_category_test where id = ?', [$id]);

        if (!count($data)){
            abort(404);
        }

        return view('admin.pages.product_category.detail')->with('data', $data[0]);
    }

    public function update(ProductCategoryUpdateRequest $request, string $id){

        // $check = DB::update('UPDATE product_category_test SET name = ?, slug = ?, status = ? WHERE id = ?', [$request->name, $request->slug, $request->status, $id]);

        //Query Builder
        $check = DB::table('product_category_test')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'status' => $request->status,
            ]);

        //Eloquent
        // $productCategoryTest = ProductCategoryTest::find($id);
        // $productCategoryTest->name = $request->name;
        // $productCategoryTest->slug = $request->slug;
        // $productCategoryTest->status = $request->status;
        // $check = $productCategoryTest->save();

        $check = ProductCategoryTest::find($id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status
        ]);


        return redirect()->route('admin.product.category.list')->with('msg', $check ? 'success' : 'failed');
    }
}
