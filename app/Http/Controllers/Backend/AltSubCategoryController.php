<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AltCategory;
use App\Models\AltSubCategory;
use App\Models\AltSubCategoryTranslation;
use Illuminate\Http\Request;
use App\Models\Category;

class AltSubCategoryController extends Controller
{
    public function create()
    {
        $categories = Category::latest()->get();
        $altCategories = AltCategory::latest()->get();
        return view('backend.alt-sub-category.create',get_defined_vars());
    }
    public function store(Request $request)
    {
        try {
            $altSubCategory = new AltSubCategory();
            $altSubCategory->alt_category_id = $request->alt_category_id;
            $altSubCategory->save();
            foreach (lang() as $language) {
                $translation = new AltSubCategoryTranslation();
                $translation->title = $request->title[$language->code];
                $translation->slug = $request->slug[$language->code];
                $translation->locale = $language->code;
                $translation->alt_sub_category_id = $altSubCategory->id;
                $translation->save();
            }
            return to_route('alt-category.show', $request->alt_category_id)->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(AltSubCategory $altSubCategory)
    {
        $categories = Category::latest()->get();
        $altCategories = AltCategory::latest()->get();
        return view('backend.alt-sub-category.edit', get_defined_vars());
    }

    public function update(Request $request, AltSubCategory $altSubCategory)
    {
        try {
            foreach (lang() as $language) {
                $translationData = [
                    'title' => $request->title[$language->code],
                    'slug' => $request->slug[$language->code],
                    'locale' => $language->code,
                ];
                $altSubCategory->translations()->updateOrCreate(['locale' => $language->code], $translationData);
            }
            $altSubCategory->alt_category_id = $request->alt_category_id;
            $altSubCategory->save();
            return to_route('alt-category.show',$request->alt_category_id)->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function destroy(AltSubCategory $altSubCategory)
    {
        $altSubCategory->delete();
        return to_route('alt-category.show', $altSubCategory->alt_category_id)->with('success', __('messages.success'));
    }
}
