<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AltCategory;
use App\Models\AltCategoryTranslation;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryTranslation;

class AltCategoryController extends Controller
{
    public function index()
    {
        $altCategories = AltCategory::with("category")->latest()->get();
        return view('backend.alt-category.index', get_defined_vars());
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('backend.alt-category.create',get_defined_vars());
    }

    public function store(Request $request)
    {
        try {
            $altCategory = new AltCategory();
            $altCategory->category_id = $request->category_id;
            $altCategory->save();
            foreach (lang() as $language) {
                $translation = new AltCategoryTranslation();
                $translation->title = $request->title[$language->code];
                $translation->slug = $request->slug[$language->code];
                $translation->locale = $language->code;
                $translation->alt_category_id = $altCategory->id;
                $translation->save();
            }
            return to_route('alt-category.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(AltCategory $altCategory)
    {
        $categories = Category::latest()->get();
        return view('backend.alt-category.edit', get_defined_vars());
    }

    public function update(Request $request, AltCategory $altCategory)
    {
        try {
            foreach (lang() as $language) {
                $translationData = [
                    'title' => $request->title[$language->code],
                    'slug' => $request->slug[$language->code],
                    'locale' => $language->code,
                ];
                $altCategory->translations()->updateOrCreate(['locale' => $language->code], $translationData);
            }
            $altCategory->category_id = $request->category_id;
            $altCategory->save();
            return to_route('alt-category.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function destroy(AltCategory $altCategory)
    {
        $altCategory->delete();
        return to_route('alt-category.index')->with('success', __('messages.success'));
    }
}
