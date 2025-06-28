<?php

declare(strict_types=1);

// use App\Http\Controllers\Admin\Auth\LogoutController;

use App\Http\Controllers\Admin\Banner\CreateBannerController;
use App\Http\Controllers\Admin\Banner\IndexBannerController;
use App\Http\Controllers\Admin\Dashboard\IndexDashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// dashboard route
// Route::group(['prefix' => 'auth', 'middleware' => ['guest']], function () {
//     Route::get('/', fn () => Inertia::render('Admin/Login/Index'))->name('login');
//     Route::post('/', StoreLoginController::class)->name('login');
// });

// Route::middleware(['auth', 'isAdmin'])->group(function ()
Route::middleware(['auth'])->group(function () {

    // dashboard route
    Route::group(['as' => 'dashboard:'], function () {
        Route::get('/', IndexDashboardController::class)->name('index');
    });

    // banner route
    Route::group(['prefix' => 'banners', 'as' => 'banners:'], function () {
        Route::get('/', IndexBannerController::class)->name('index');
        Route::get('/create', CreateBannerController::class)->name('create');
    });

    // logout route
    // Route::post('/logout', LogoutController::class)->name('logout');
});
