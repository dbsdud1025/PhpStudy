<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\{RedirectResponse, Request, Response};
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    
    protected function redirectToProvider(string $provider): RedirectResponse
    {
        return Socialite::with($provider)->redirect();
    }

    protected function handleProviderCallback(Request $request, string $provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $userToLogin=User::where([
            'provider'=> $provider,
            'socialid'=> $user->getId(),
            ])->first();
            
        if (!$userToLogin){
                User::create([
                    'provider'=> $provider,
                    'socialid'=> $user->getId(),
                    'token'=> $user->token,
                    'name'=>$user->getName(),
                ]);
                $userToLogin=User::where([
                    'provider'=> $provider,
                    'socialid'=> $user->getId(),
                    ])->first();
                   
        }  
        \Auth::guard()->login($userToLogin,$a=true);
        return  redirect() -> route('post.index');

  
        
    }

}