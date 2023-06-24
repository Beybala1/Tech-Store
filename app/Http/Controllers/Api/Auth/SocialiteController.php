<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Two\InvalidStateException;

class SocialiteController extends Controller
{   
    public function redirectToGoogle()
    {
        // return Socialite::driver('google')->redirect();
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
            $token = $existingUser->createToken('MyApp', ['user:read'])->plainTextToken;

            return response()->json(['message' => 'User logged in successfully', 'token' => $token]);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => bcrypt('temporary-password')
            ]);

            Auth::login($newUser);
            $token = $newUser->createToken('MyApp', ['user:read'])->plainTextToken;

            return response()->json(['message' => 'User registered and logged in successfully', 'token' => $token]);
        }
    }
}
