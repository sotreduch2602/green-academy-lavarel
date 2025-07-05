<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        $googleUser = Socialite::driver('google')->user();

        $user = User::create([
            'name' => $googleUser->name(),
            'email' => $googleUser->email(),
            'password' => Hash::make('password'),
        ]);

        Auth::login($user);

        return redirect()->route();


    }
}
