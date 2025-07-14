<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index(Request $request)
    {
        $keyword = $request->search ?? '';
        $sort =$request->sort ?? '';

        $itemPerpage = config('itemsperpage.items_per_page', 2);

        $array = ['id', 'desc'];
        if ($sort ==='oldest') {
            $array = ['id', 'asc'];
        }

        [$column, $sort] = $array;

        //QueryBuilder
        // $datas = DB::table('products')
        //     ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        //     ->select('products.*', 'categories.name as category_name')
        //     ->orderBy('products.id', 'desc')
        //     ->paginate($itemPerpage);

        //Eloquent
        $datas = Product::with('productCategory')  // Eager load the category
        ->where('name', 'like', '%' . $keyword . '%')
        ->orderBy('id', 'desc')
        ->paginate($itemPerpage);

        return view('admin.pages.product.list', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $datas = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'shipping' => $request->shipping,
            'weight' => $request->weight,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $msg = $product->delete() ? 'success' : ' failed';

        return redirect()->route('admin.product.index')->with('msg', $msg);
    }
}
