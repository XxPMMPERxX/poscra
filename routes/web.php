<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\TopPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TopPageController::class, 'index']);

Route::get('/auth/redirect', function () {
    if (auth()->check()) return redirect('/dashboard');
    return Socialite::driver('google')->redirect();
})->name('google_auth');

Route::get('/auth/callback', [GoogleAuthController::class, 'handleLogin']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');