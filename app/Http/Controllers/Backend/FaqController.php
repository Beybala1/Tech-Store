<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqTranslation;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->get();
        return view('backend.faq.index', get_defined_vars());
    }

    public function create()
    {
        return view('backend.faq.create');
    }

    public function store(Request $request)
    {
        try {
                $faq = Faq::create();
                foreach (lang() as $language) {
                    $translation = new FaqTranslation();
                    $translation->title = $request->title[$language->code];
                    $translation->description = $request->description[$language->code];
                    $translation->locale = $language->code;
                    $translation->faq_id = $faq->id;
                    $translation->save();
                }
            return to_route('faq.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(Faq $faq)
    {
        return view('backend.faq.edit', get_defined_vars());
    }

    public function update(Request $request, Faq $faq)
    {
        try {
            foreach (lang() as $language) {
                $translationData = [
                    'title' => $request->title[$language->code],
                    'description' => $request->description[$language->code],
                    'locale' => $language->code,
                ];
                $faq->translations()->updateOrCreate(['locale' => $language->code], $translationData);
            }

            $faq->save();
            return to_route('faq.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return to_route('faq.index')->with('success', __('messages.success'));
    }
}
