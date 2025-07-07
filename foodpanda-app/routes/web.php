<?php

use App\Http\Controllers\SSO\SSOController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
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
Route::get("/sso/login", [SSOController::class, 'getLogin'])->name("sso.login");
Route::get("/callback", [SSOController::class, 'getCallback'])->name("sso.callback");
Route::get("/sso/connect", [SSOController::class, 'connectUser'])->name("sso.connect");

Route::get('/logout-from-sso', function(){
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('http://127.0.0.1:8000/login');
});

Auth::routes(['register' => false, 'reset' => false ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');



Route::post('/logout', function(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    $ssoLogoutUrl = 'http://127.0.0.1:8000/logout-from-client'; 
    return redirect($ssoLogoutUrl);
})->name('logout');