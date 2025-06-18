<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    echo "Test route is working!";
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

Route::get('test/{test?}', function ($test = 'null'){
    echo "Test value: $test";
});