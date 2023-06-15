<?php

namespace App\Http\Controllers\Backend;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('backend.partner.index',get_defined_vars());
    }

    public function create()
    {
        return view('backend.partner.create');
    }

    public function store(Request $request)
    {
        try {
            $partner = Partner::create([
                'link' => $request->link,
                'alt' => $request->alt,
                'image' => upload('partners', $request->file('image')),
            ]);
            return to_route('partner.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(Partner $partner)
    {
        return view('backend.partner.edit', get_defined_vars());
    }

    public function update(Request $request, Partner $partner)
    {
        try {
            if ($request->hasFile('image')) {
                $imagePath = public_path($partner->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $partner->image = upload('partners', $request->file('image'));
            }
            $partner->link=$request->link;
            $partner->alt=$request->alt;
            $partner->save();
            return to_route('partner.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function destroy(Partner $partner)
    {
        $imagePath = public_path($partner->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $partner->delete();
        return to_route('partner.index')->with('success', __('messages.success'));
    }
}
