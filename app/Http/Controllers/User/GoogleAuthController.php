<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    //
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();

    }

//receiving the callback from the provider after authentication

    public function googleCallback()
    {

        try {
            $user = Socialite::driver('google')->user();
//            check if user exists in our db:
            $existedUser = User::where('oauth_id', $user->id)->where('oauth_type', 'google')->first();
            if ($existedUser) {
                Auth::login($existedUser);
                return redirect()->route('dashboard');

            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => 'google',
                    'password' => Hash::make($user->id),
                ]);
                Auth::login($newUser);
                return redirect()->route('dashboard');

            }


        } catch (\Exception $exception) {
            dd($exception);


        }


    }


}
