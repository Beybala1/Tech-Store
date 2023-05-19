<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;
class ProfileAdminController extends Controller
{
    public function index()
    {
        return view('backend.profile');
    }

    public function update(ProfileRequest $request)
    {
        $user = User::find(auth()->id());

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'confirmed|min:6',
            ]);
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            $image = upload('profile', $request->file('image'));
            File::delete($user->image);
        } else{
            $image = $user->image;
        }

        $user->name = $request->user_name;
        $user->email = $request->email;
        $user->image = $image;
        $user->save();

        return back()->with('success', '__(messages.success)');
    }
}
