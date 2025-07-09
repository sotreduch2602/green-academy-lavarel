<?php
    use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Client\GoogleController;
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
        return view('client.pages.home')->name('client.home');
    });

    Route::get('client/about', function () {
        return view('client.pages.about');
    });

    Route::get('client/layout_master', function () {
        return view('client.layout.master');
    });

    use Laravel\Socialite\Facades\Socialite;

    Route::get('google/redirect', [GoogleController::class, 'redirect'])->name('client.google.redirect');
    Route::get('google/callback', [GoogleController::class, 'callback'])->name('client.google.callback');
?>
