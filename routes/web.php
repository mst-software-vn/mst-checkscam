<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/to-cao-lua-dao', function () {
    return view('reports.index');
});
Route::get('/bao-hiem-cs', function () {
    return view('insurances.index');
});
Route::get('/bao-hiem-cs/{id}', function ($id) {
    return view('insurances.detail', ['id' => $id]);
});
Route::get('/bai-viet', function () {
    return view('posts.index');
});
Route::get('/bai-viet/{id}', function ($id) {
    return view('posts.detail', ['id' => $id]);
});

// Các trang hệ thống (System)
Route::get('/api-checkscam', function () {
    return view('system.api');
});
Route::get('/doi-tac-uy-tin', function () {
    return view('system.partners');
});

// Các trang hỗ trợ (Support)
Route::get('/huong-dan-to-cao', function () {
    return view('support.guide');
});
Route::get('/lien-he-admin', function () {
    return view('support.contact');
});

// Các trang pháp lý (Legal)
Route::get('/dieu-khoan', function () {
    return view('legal.terms');
});
Route::get('/giai-quyet-khieu-nai', function () {
    return view('legal.dispute');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
});

// Luôn nằm ở cuối
Route::get('/{name}', function ($name) {
    return view('scammer.index', ['name' => $name]);
});
