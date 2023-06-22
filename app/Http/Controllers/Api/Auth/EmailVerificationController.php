<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use App\Models\User;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $user = \App\Models\User::find($request->id);

        if ($user && hash_equals((string) $request->hash, sha1($user->getEmailForVerification()))) {
            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }

            event(new Verified($user));

            return response()->json(['message' => 'Email verification successful.']);
        }

        return response()->json(['message' => 'Email verification failed.'], 422);
    }

    public function resend(Request $request)
    {
        $user = $request->user();

        if ($user && $user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.'], 422);
        }

        if ($user) {
            $user->sendEmailVerificationNotification();
            return response()->json(['message' => 'Email verification link resent.']);
        }

        $email = $request->input('email');
        if ($email) {
            $user = User::where('email', $email)->first();

            if ($user) {
                if ($user->hasVerifiedEmail()) {
                    return response()->json(['message' => 'Email already verified.'], 422);
                }

                $user->sendEmailVerificationNotification();
                return response()->json(['message' => 'Email verification link resent.']);
            }
        }

        return response()->json(['message' => 'Email verification link could not be resent.'], 422);
    }
}
