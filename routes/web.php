<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("/", function () {
    return view("home");
});
Route::get("/to-cao-lua-dao", function () {
    return view("reports.index");
});
