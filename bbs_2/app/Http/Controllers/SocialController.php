<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Illuminate\Http\{RedirectResponse, Request, Response};
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialUser;

class SocialController extends Controller
{
    
    protected function redirectToProvider(string $provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    protected function handleProviderCallback(Request $request, string $provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        if ($user = User::where('email', $socialUser->getEmail())->first()) {
            $this->guard()->login($user, true);

            return $this->sendLoginResponse($request);
        }

        return $this->register($request, $socialUser);
    }
}