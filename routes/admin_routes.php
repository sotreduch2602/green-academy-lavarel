<?php
    use App\Http\Controllers\Admin\ProductCategoryController;
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
        ->group(function () {
            Route::get('list', 'list')->name('list');
            Route::post('store', 'store')->name('store');
            Route::get('create', 'create')->name('create');
            Route::get('make_slug', 'makeSlug')->name('make_slug');
            Route::post('destroy/{id}', 'destroy')->name('destroy');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::get('update/{id}', 'update')->name('update');
        });

