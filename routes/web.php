<?php

use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminInsuranceController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminSearchAnalyticsController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/to-cao-lua-dao', function () {
    return view('reports.index');
});

Route::post('/to-cao-lua-dao', [ReportController::class, 'store'])->name('report.store');

Route::get('/bao-hiem-cs', [\App\Http\Controllers\InsuranceController::class, 'index'])->name('insurances.frontend.index');
Route::get('/bao-hiem-cs/{slug}', [\App\Http\Controllers\InsuranceController::class, 'show'])->name('insurances.frontend.show');

Route::get('/bai-viet', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.frontend.index');
Route::get('/bai-viet/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.frontend.show');

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

        /**
         * ------------------------------------------
         * ---             Report                 ---
         * ------------------------------------------
         */
        Route::post('/reports/bulk-delete', [AdminReportController::class, 'bulkDestroy'])->name('reports.bulk-delete');
        Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('/', [AdminReportController::class, 'index'])->name('index');
            Route::get('/{id}', [AdminReportController::class, 'show'])->name('detail');
            Route::post('/{id}/approve', [AdminReportController::class, 'approve'])->name('approve');
            Route::post('/{id}/reject', [AdminReportController::class, 'reject'])->name('reject');
            Route::put('/{id}', [AdminReportController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminReportController::class, 'destroy'])->name('destroy');
        });

        /**
         * ------------------------------------------
         * ---           Insurances               ---
         * ------------------------------------------
         */
        Route::post('/insurances/bulk-delete', [AdminInsuranceController::class, 'bulkDestroy'])->name('insurances.bulk-delete');
        Route::prefix('insurances')->name('insurances.')->group(function () {
            Route::get('/', [AdminInsuranceController::class, 'index'])->name('index');
            Route::get('/create', [AdminInsuranceController::class, 'create'])->name('create');
            Route::post('/', [AdminInsuranceController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminInsuranceController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AdminInsuranceController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminInsuranceController::class, 'destroy'])->name('destroy');
        });

        /**
         * ------------------------------------------
         * ---              Posts                 ---
         * ------------------------------------------
         */
        Route::post('/posts/bulk-delete', [AdminPostController::class, 'bulkDestroy'])->name('posts.bulk-delete');
        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('/', [AdminPostController::class, 'index'])->name('index');
            Route::get('/create', [AdminPostController::class, 'create'])->name('create');
            Route::post('/', [AdminPostController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminPostController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AdminPostController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminPostController::class, 'destroy'])->name('destroy');
        });

        /**
         * ------------------------------------------
         * ---            Comments                ---
         * ------------------------------------------
         */
        Route::post('/comments/bulk-delete', [AdminCommentController::class, 'bulkDestroy'])->name('comments.bulk-delete');
        Route::prefix('comments')->name('comments.')->group(function () {
            Route::get('/', [AdminCommentController::class, 'index'])->name('index');
            Route::delete('/{id}', [AdminCommentController::class, 'destroy'])->name('destroy');
        });

        /**
         * ------------------------------------------
         * ---        Search Analytics            ---
         * ------------------------------------------
         */
        Route::get('/search-analytics', [AdminSearchAnalyticsController::class, 'index'])->name('search-analytics.index');

        /**
         * ------------------------------------------
         * ---              Users                 ---
         * ------------------------------------------
         */
        Route::post('/users/bulk-delete', [AdminUserController::class, 'bulkDestroy'])->name('users.bulk-delete');
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('create');
            Route::post('/', [AdminUserController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminUserController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AdminUserController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminUserController::class, 'destroy'])->name('destroy');
        });

        /**
         * ------------------------------------------
         * ---            Settings                ---
         * ------------------------------------------
         */
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [AdminSettingController::class, 'index'])->name('index');
            Route::post('/', [AdminSettingController::class, 'update'])->name('update');
        });
    });

    Route::name('auth.')->group(function () {
        Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});

/**
 * ------------------------------------------
 * ---             Search                 ---
 * ------------------------------------------
 */
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search/autocomplete', [SearchController::class, 'autoComplete'])->name('search.autocomplete');
Route::post('/search/clear-history', [SearchController::class, 'clearHistory'])->name('search.clearHistory');

/**
 * ------------------------------------------
 * ---             Comment                ---
 * ------------------------------------------
 */
Route::post('/reports/{reportId}/comments', [CommentController::class, 'store'])
    ->name('comment.store');

Route::patch('/comments/{id}', [CommentController::class, 'update'])
    ->name('comment.update');

Route::delete('/comments/{id}', [CommentController::class, 'destroy'])
    ->name('comment.destroy');

/**
 * ------------------------------------------
 * ---             Slug URL               ---
 * ------------------------------------------
 */
Route::get('/{slug}', [App\Http\Controllers\ReportController::class, 'show'])->name('scammer.show');
