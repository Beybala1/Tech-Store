<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
class TestController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        return view("test",get_defined_vars());
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_numbers.*' => 'required|string', // Allow validation for an array of phone numbers
            'addresses.*' => 'required|string', // Allow validation for an array of phone numbers
            // Add other validation rules as needed.
        ]);

        // Create a new Company instance and save it to the database
        $company = Company::create([
            'name' => $validatedData['name'],
            'phone_numbers' => $validatedData['phone_numbers'],
            'addresses' => $validatedData['addresses'],
            // Add other fields as needed.
        ]);

        // Redirect the user or show a success message
        // ...
    }

}
