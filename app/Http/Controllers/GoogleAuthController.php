<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller {

    public function handleLogin() {
        $googleUser = Socialite::driver('google')->user();

        if (!$googleUser) return redirect('/')->with('error_message', 'ログインエラーが発生しました。');

        //dd($googleUser->id);
        if (
            User::where('google_id', $googleUser->getId())
                ->exists()
        ) {
            $user = User::where('google_id', $googleUser->getId())->first();
            $user->email = $googleUser->getEmail();
            $user->google_token = $googleUser->token;
            $user->google_refresh_token = $googleUser->refreshToken;
            $user->save();
        } else {
            $user = User::create(
            [
                'google_id' => $googleUser->getId(),
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
                'email_verified_at' => now(),
            ]);
        }
        

        if (!$user) return redirect('/')->with('error_message', 'ログインエラーが発生しました。');

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function handleLogout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}