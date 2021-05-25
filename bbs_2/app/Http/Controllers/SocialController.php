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
            }
            \Auth::login($userToLogin, true);

            // $posts= Post::orderBy('created_at', 'desc')->paginate(5);
            // $login=auth()->user();
            // return view('post.index', compact('posts', 'login'));
        
            return redirect('/post');
    //     if ($user = User::where('email'," $socialUser->getEmail()")->first()) {
    //         $this->guard()->login($user, true);

    //         return $this->sendLoginResponse($request);
    //     }

    //     return "$socialUser->getEmail()";
        
    }

    // protected function register(Request $request, SocialUser $socialUser)
    // {
    //     event(new Registered($user = User::create($socialUser->getRaw())));
    //     $user->name="a";
    //     $user->email_verified_at = $user->freshTimestamp();
    //     $user->remember_token = Str::random(60);
    //     $user->save();

    //     $this->guard()->login($user, true);

    //     return $this->sendLoginResponse($request);
    // }
}