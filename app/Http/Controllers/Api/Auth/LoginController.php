<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (!$user->hasVerifiedEmail()) {
            // Email not verified
                Auth::logout();
                throw ValidationException::withMessages(['error' => 'Your email is not verified. Please check your email for the verification link.']);
            }

        // Email verified, continue with login
            return response()->json(['message' => 'Login successful']);
        }

        // Failed authentication
        throw ValidationException::withMessages(['error' => 'Invalid login credentials.']);
    }


    public function user(Request $request)
    {
        return $request->user();
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
        }

        return response()->json(['message' => 'Logged out successfully']);
    }
}
