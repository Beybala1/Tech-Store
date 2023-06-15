<?php

namespace App\Http\Controllers\Backend;

use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::all();
        return view('backend.social.index',get_defined_vars());
    }

    public function create()
    {
        return view('backend.social.create');
    }

    public function store(Request $request)
    {
        try {
            $social = Social::create([
                'icon' => $request->icon,
                'link' => $request->link,
            ]);
            return to_route('social.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(Social $social)
    {
        return view('backend.social.edit', get_defined_vars());
    }

    public function update(Request $request, Social $social)
    {
        try {
            $social->update([
                'icon'=>$request->icon,
                'link'=>$request->link,
            ]);
            return to_route('social.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function destroy(Social $social)
    {
        $social->delete();
        return to_route('social.index')->with('success', __('messages.success'));
    }

    public function status(Request $request, $id)
    {
        try {
            $social = Social::findOrFail($id);
            $newStatus = $social->status === 1 ? 0 : 1;
            $social->update([
                'status' => $newStatus,
            ]);

            return redirect()->route('social.index')->with('success', __('messages.success'));
        } catch (\Exception $e) {
            return back()->with('warning', __('messages.fail'));
        }
    }
}
