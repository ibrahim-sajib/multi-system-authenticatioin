<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// override only the logout
Route::post('/logout', function(Request $request) {

    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();

    $clientAppUrl = 'http://127.0.0.1:8001/logout-from-sso';
    return redirect($clientAppUrl);

})->name('logout');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/different-account', [App\Http\Controllers\HomeController::class, 'differentAccount'])->name('different-account');
Route::get('/reset-auth', [App\Http\Controllers\HomeController::class, 'resetAuth'])->name('reset-auth');



Route::get('/logout-from-client', function(Request $request) {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();

    return redirect('http://127.0.0.1:8001/login');
});
