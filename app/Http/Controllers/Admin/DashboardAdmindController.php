<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardAdmindController extends Controller
{
    public function index()
    {
        $user = User::count();
        return view('backend.dashboard',get_defined_vars());
    }
}
