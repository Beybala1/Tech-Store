<?php

namespace App\Http\Controllers\Backend;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('backend.language.index',get_defined_vars());
    }

    public function create()
    {
        return view('backend.language.create');
    }

    public function store(Request $request)
    {
        try {
            $language = language::create([
                'name' => $request->name,
                'code' => $request->code,
            ]);
            return to_route('language.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(language $language)
    {
        return view('backend.language.edit', get_defined_vars());
    }

    public function update(Request $request, language $language)
    {
        try {
            $language->update([
                'name'=>$request->name,
                'code'=>$request->code,
            ]);
            return to_route('language.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function destroy(language $language)
    {
        $language->delete();
        return to_route('language.index')->with('success', __('messages.success'));
    }

    public function languageStatus(Request $request, $id)
    {
        try {
            $language = Language::findOrFail($id);
            $newStatus = $language->status === 1 ? 0 : 1;
            $language->update([
                'status' => $newStatus,
            ]);

            return redirect()->route('language.index')->with('success', __('messages.success'));
        } catch (\Exception $e) {
            return back()->with('warning', __('messages.fail'));
        }
    }
}
