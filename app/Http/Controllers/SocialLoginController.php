<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect(Request $request)
    {
        if ($request->has('intended')) {
            session()->put('url.intended', $request->get('intended'));
        }

        return Socialite::driver('github')->redirect();
    }


    public function callback(string $provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $user = User::firstOrCreate([
            'email' => $socialUser->getEmail(),
        ], [
            'name' => $socialUser->getName() ?? $socialUser->getNickname(),
            'password' => Hash::make(Str::random(32)),
        ]);

        Auth::login($user);

        return redirect()->intended('/');
    }
}
