<?php

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

Route::get('scores', function () {
    return view('scores.scores');
});

Route::get('scores_blade', function () {
    return view('scores.scores_blade');
});

Route::get('layout_blade', function () {
    return view('Layout.master');
});

Route::get('home', function () {
    return view('template.home');
});

