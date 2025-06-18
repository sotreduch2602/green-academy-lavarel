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
