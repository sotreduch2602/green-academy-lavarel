<?php

use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckIsLogin;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require_once __DIR__.'/client_routes.php';
require_once __DIR__.'/admin_routes.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin/product_category')
->controller(ProductCategoryController::class)
->name('admin.product_category.')
->group(function(){
    Route::get('list', 'list')->name('list');
    Route::post('store', 'store')->name('store');
    Route::get('create', 'create')->name('create');
    Route::get('make_slug', 'makeSlug')->name('make_slug');
    Route::post('destroy/{id}', 'destroy')->name('destroy');
    Route::get('detail/{id}', 'detail')->name('detail');
    Route::post('update/{id}', 'update')->name('update');
});

require __DIR__.'/auth.php';

Route::get('pepsi', function () {
    return 'Hello Pepsi';
})->name('pepsi');

Route::get('coca', function () {
    return 'Hello Coca';
})->name('coca');

Route::get('heliken', function () {
    return 'Hello Heliken';
})->middleware('check_age_18');

Route::get('hennessy', function () {
    return 'Hello Hennessy';
})->name('hennessy');



