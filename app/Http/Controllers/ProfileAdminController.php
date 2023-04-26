<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileAdminController extends Controller
{
    public function index()
    {
        return view('backend.profile');
    }

    public function update(ProfileRequest $request)
    {
        if(Hash::check($request->current_password, auth()->user()->password)){
            echo'1';
        }
        echo '0';
    }
}
