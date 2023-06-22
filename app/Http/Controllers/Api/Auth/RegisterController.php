<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;
        $user->sendEmailVerificationNotification();

        return response()->json(['message' => 'Registration successful', 'token' => $token], 201);
    }
}
