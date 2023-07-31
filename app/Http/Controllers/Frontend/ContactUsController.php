<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\ContactInfo;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("frontend.contact-us");
    }

    public function store(MessageRequest $request)
    {
        try {
            Message::create($request->validated());
            return back()->with('success', __('messages.successMessage'));
        } catch (\Exception $e) {
            return back()->with('warning', __('messages.failMessage'));
        }
    }
}
