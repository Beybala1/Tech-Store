<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Social;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::all();
        return response()->json($socials);
    }
}
