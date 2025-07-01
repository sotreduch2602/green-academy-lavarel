<?php

use App\Http\Controllers\Admin\ProductCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    echo "Test route is working!";
});

Route::get('test/{test?}', function ($test = 'null'){
    echo "Test value: $test";
});

Route::get('a/b/c/d/e/f', function () {
    $name = 'Nguyen Van A';
    echo "<h2>Hello, $name!</h2>";
});

Route::get('name/{name}', function ($name) {
    echo $name;
});

Route::get('product/detail/{id}', function ($id) {
    echo "Product ID: $id";
});

Route::get('ten/{ten?}/tuoi/{tuoi?}', function ($ten = 'Anonymous', $tuoi = 'Unknown') {
    echo "Name: $ten, Age: $tuoi";
});

Route::get('client/home', function () {
    return view('client.pages.home');
});

Route::get('client/about', function () {
    return view('client.pages.about');
});

Route::get('client/layout_master', function () {
    return view('client.layout.master');
});

Route::get('admin/home', function () {
    return view('admin.pages.home');
});

// Route::get('admin/product_category/create', function () {
//     return view('admin.pages.product_category.create');
// });

Route::get('admin/product_category/list', [ProductCategoryController::class, 'list'])->name('admin.product.category.list');

Route::get('admin/product_category/create', [ProductCategoryController:: class, 'create'])->name('admin.product.category,create');

Route::post('admin/product_category/store', [ProductCategoryController::class, 'store'])->name('admin.product_category.store');

Route::get('admin/product_category/make_slug', [ProductCategoryController::class, 'make_slug'])->name('admin.product_category.make_slug');

Route::post('admin/product_category/destroy/{id}', [ProductCategoryController::class, 'destroy'])->name('admin.product_category.destroy');

Route::get('admin/product_category/detail/{id}', [ProductCategoryController::class, 'detail'])->name('admin.product_category.detail');

Route::post('admin/product_category/update/{id}', [ProductCategoryController::class, 'update'])->name('admin.product_category.update');
