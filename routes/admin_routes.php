<?php
    use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\CheckIsAdmin;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;


Route::get('admin/home', function () {
    return view('admin.pages.home');
});
// Route::get('admin/product_category/create', function () {
//     return view('admin.pages.product_category.create');
// });

// Route::get('admin/product_category/list', [ProductCategoryController::class, 'list'])->name('admin.product.category.list');

// Route::get('admin/product_category/create', [ProductCategoryController:: class, 'create'])->name('admin.product.category,create');

// Route::post('admin/product_category/store', [ProductCategoryController::class, 'store'])->name('admin.product_category.store');

// Route::get('admin/product_category/make_slug', [ProductCategoryController::class, 'make_slug'])->name('admin.product_category.make_slug');

// Route::post('admin/product_category/destroy/{id}', [ProductCategoryController::class, 'destroy'])->name('admin.product_category.destroy');

// Route::get('admin/product_category/detail/{id}', [ProductCategoryController::class, 'detail'])->name('admin.product_category.detail');

// Route::post('admin/product_category/update/{id}', [ProductCategoryController::class, 'update'])->name('admin.product_category.update');

Route::prefix('admin/product_category')
->controller(ProductCategoryController::class)
->name('admin.product_category.')
->middleware(CheckIsAdmin::class)
->group(function(){
    Route::get('list', 'list')->name('list');
    Route::post('store', 'store')->name('store');
    Route::get('create', 'create')->name('create');
    Route::get('make_slug', 'makeSlug')->name('make_slug');
    Route::post('destroy/{productCategory}', 'destroy')->name('destroy');
    Route::get('detail/{productCategory}', 'detail')->name('detail');
    Route::post('update/{productCategory}', 'update')->name('update');
    Route::post('restore/{id}', 'restore')->name('restore');
});

Route::resource('admin/product', ProductController::class)->names('admin.product')->middleware(CheckIsAdmin::class);
