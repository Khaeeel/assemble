<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log; 


class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

  public function callback()
{
    try {
        $googleUser = Socialite::driver('google')->user();

        Log::info('Google user data: ', (array) $googleUser);

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt('google-oauth-placeholder'),
            ]
        );

        

        Log::info('User found or created:', ['id' => $user->id, 'email' => $user->email]);

        Auth::login($user);

        Log::info('User logged in:', ['id' => Auth::id()]);

        return redirect('/dashboard');

    } catch (\Exception $e) {
        Log::error('Google login failed: ' . $e->getMessage());
        return redirect('/login')->with('error', 'Google login failed: ' . $e->getMessage());
    }
}
}