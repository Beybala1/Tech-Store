<?php

namespace App\Http\Controllers\Backend;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contactInfos = ContactInfo::all();
        return view('backend.contact-info.index',get_defined_vars());
    }

    public function create()
    {
        return view('backend.contact-info.create');
    }

    public function store(Request $request)
    {
        try {
            $contactInfo = ContactInfo::create([
                'content' => $request->content,
            ]);
            return to_route('contact-info.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(ContactInfo $contactInfo)
    {
        return view('backend.contact-info.edit', get_defined_vars());
    }

    public function update(Request $request, ContactInfo $contactInfo)
    {
        try {
            $contactInfo->update([
                'content'=>$request->content,
            ]);
            return to_route('contact-info.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function destroy(ContactInfo $contactInfo)
    {
        $contactInfo->delete();
        return to_route('contact-info.index')->with('success', __('messages.success'));
    }
}
