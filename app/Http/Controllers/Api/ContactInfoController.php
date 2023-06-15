<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contactInfos = ContactInfo::all();
        return response()->json($contactInfos);
    }
}
