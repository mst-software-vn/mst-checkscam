<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/to-cao-lua-dao', function () {
    return view('reports.index');
});

Route::post('/to-cao-lua-dao', [ReportController::class, 'store'])->name('report.store');

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
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Reports
        Route::get('/reports', function () {
            return view('admin.reports.index');
        })->name('reports.index');
        Route::get('/reports/{id}', function ($id) {
            return view('admin.reports.detail', ['id' => $id]);
        })->name('reports.detail');

        // Scam Records
        Route::get('/scam-records', function () {
            return view('admin.scam-records.index');
        })->name('scam-records.index');

        // Insurances
        Route::get('/insurances', function () {
            return view('admin.insurances.index');
        })->name('insurances.index');
        Route::get('/insurances/create', function () {
            return view('admin.insurances.create');
        })->name('insurances.create');

        // Posts
        Route::get('/posts', function () {
            return view('admin.posts.index');
        })->name('posts.index');
        Route::get('/posts/create', function () {
            return view('admin.posts.create');
        })->name('posts.create');

        // Comments
        Route::get('/comments', function () {
            return view('admin.comments.index');
        })->name('comments.index');

        // Search Analytics
        Route::get('/search-analytics', function () {
            return view('admin.search-analytics.index');
        })->name('search-analytics.index');

        // Users
        Route::get('/users', function () {
            return view('admin.users.index');
        })->name('users.index');
        Route::get('/users/create', function () {
            return view('admin.users.create');
        })->name('users.create');

        // Settings
        Route::get('/settings', function () {
            return view('admin.settings.index');
        })->name('settings.index');
    });

    Route::name('auth.')->group(function () {
        Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});

Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search/autocomplete', [SearchController::class, 'autoComplete'])->name('search.autocomplete');
Route::post('/search/clear-history', [SearchController::class, 'clearHistory'])->name('search.clearHistory');

// Luôn nằm ở cuối (Hiển thị chi tiết Report theo Slug)
Route::get('/{slug}', [App\Http\Controllers\ReportController::class, 'show'])->name('scammer.show');
