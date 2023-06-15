<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutTranslation;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->get();
        return view('backend.about.index', get_defined_vars());
    }

    public function edit(About $about)
    {
        return view('backend.about.edit', get_defined_vars());
    }

    public function update(Request $request, About $about)
    {
        try {
            if ($request->hasFile('image')) {
                $imagePath = public_path($about->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $about->image = upload('abouts', $request->file('image'));
            }
            foreach (lang() as $language) {
                $translationData = [
                    'title' => $request->title[$language->code],
                    'content' => $request->content[$language->code],
                    'alt' => $request->alt[$language->code],
                    'locale' => $language->code,
                ];
                $about->translations()->updateOrCreate(['locale' => $language->code], $translationData);
            }

            $about->save();
            return to_route('about.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }


    public function destroy(About $about)
    {
        $imagePath = public_path($about->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $about->delete();
        return to_route('about.index')->with('success', __('messages.success'));
    }
}
