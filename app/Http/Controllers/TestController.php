<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
class TestController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // try {
            //create a user using socialite driver google
            $user = Socialite::driver('google')->user();
            // if the user exits, use that user and login
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                //if the user exists, login and show dashboard
                Auth::login($finduser);
                return redirect('/dashboard');
            } else {
                //user is not yet created, so create first
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('')
                ]);
     
                $newUser->save();
                //login as the new user
                Auth::login($newUser);
                // go to the dashboard
                return redirect('/dashboard');
            }
            //catch exceptions
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }
    }
}
