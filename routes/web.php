<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Storage;
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
Route::get('privacy-policy', function() {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/auth/redirect', function () {
    if (auth()->check()) return redirect('/dashboard');
    return Socialite::driver('google')->redirect();
})->name('google_auth');

Route::get('/auth/callback', [GoogleAuthController::class, 'handleLogin']);
Route::post('/logout', [GoogleAuthController::class, 'handleLogout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/post/{post_id}', function($post_id) {
    $post = App\Models\Post::findOrFail($post_id);
    return view('detail', ['post' => $post]);
});

Route::get('/post/{post_id}/embed', function($post_id) {
    $post = App\Models\Post::findOrFail($post_id);
    if ($post->attachment->attachment_type !== "3dmodel") {
        abort(404);
    }
    return view('detail_embed', ['post' => $post]);
});

Route::get('/post/{post_id}/download', function($post_id) {
    $post = App\Models\Post::findOrFail($post_id);
    $structure_name = explode(":",$post->attachment->structure_name);
    $structure_name = $structure_name[1];
    return Storage::download($post->attachment->structure, $structure_name . ".mcstructure");
});