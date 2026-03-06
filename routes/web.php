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
Route::get("/bao-hiem-cs", function () {
    return view("insurances.index");
});
Route::get("/bao-hiem-cs/{id}", function ($id) {
    return view("insurances.detail", ['id' => $id]);
});
Route::get("/bai-viet", function () {
    return view("posts.index");
});
Route::get("/bai-viet/{id}", function ($id) {
    return view("posts.detail", ["id" => $id]);
});
