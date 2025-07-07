<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        $googleUser = Socialite::driver('google')->user();
        // $user = User::where('google_id', $googleUser->getId())->first();

        // if (!$user){
        //     $user = User::create([
        //         'name' => $googleUser->getName(),
        //         'email' => $googleUser->getEmail(),
        //         'password' => Hash::make(uniqid()), // Generate a random password
        //         'google_id' => $googleUser->getId(), // Store Google ID if needed
        //     ]);
        // }
        // else{
        //     $user->name = $googleUser->getName();
        //     $user->save();
        // }
        // Update or create the user based on Google ID
        $user = User::updateOrCreate(
            ['google_id' => $googleUser->id],
            [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Hash::make('password'),
                'google_id' => $googleUser->id,
            ]
        );

        Auth::login($user);

        return redirect(route('admin.product_category.list', absolute: false));
    }
}
