<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderTranslation;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.index', get_defined_vars());
    }

    public function create()
    {
        return view('backend.slider.create');
    }

    public function store(Request $request)
    {
        try {
            if ($request->hasFile('image')) {
                $slider = Slider::create([
                    'image' => upload('sliders', $request->file('image')),
                ]);
                foreach (lang() as $language) {
                    $translation = new SliderTranslation();
                    $translation->title = $request->title[$language->code];
                    $translation->content = $request->content[$language->code];
                    $translation->alt = $request->alt[$language->code];
                    $translation->locale = $language->code;
                    $translation->slider_id = $slider->id;
                    $translation->save();
                }
            }
            return to_route('slider.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(Slider $slider)
    {
        return view('backend.slider.edit', get_defined_vars());
    }

    public function update(Request $request, Slider $slider)
    {
        try {
            if ($request->hasFile('image')) {
                $imagePath = public_path($slider->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $slider->image = upload('sliders', $request->file('image'));
            }
            foreach (lang() as $language) {
                $translationData = [
                    'title' => $request->title[$language->code],
                    'content' => $request->content[$language->code],
                    'alt' => $request->alt[$language->code],
                    'locale' => $language->code,
                ];
                $slider->translations()->updateOrCreate(['locale' => $language->code], $translationData);
            }

            $slider->save();
            return to_route('slider.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }


    public function destroy(Slider $slider)
    {
        $imagePath = public_path($slider->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $slider->delete();
        return to_route('slider.index')->with('success', __('messages.success'));
    }
}
