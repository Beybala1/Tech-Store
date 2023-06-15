<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryTranslation;

class CategoryController extends Controller
{
     public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.category.index', get_defined_vars());
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        try {
            $category = new Category();
            $category->save();
            foreach (lang() as $language) {
                $translation = new CategoryTranslation();
                $translation->title = $request->title[$language->code];
                $translation->slug = $request->slug[$language->code];
                $translation->locale = $language->code;
                $translation->category_id = $category->id;
                $translation->save();
            }
            return to_route('category.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(Category $category)
    {
        return view('backend.category.edit', get_defined_vars());
    }

    public function update(Request $request, Category $category)
    {
        try {
            foreach (lang() as $language) {
                $translationData = [
                    'title' => $request->title[$language->code],
                    'slug' => $request->slug[$language->code],
                    'locale' => $language->code,
                ];
                $category->translations()->updateOrCreate(['locale' => $language->code], $translationData);
            }

            $category->save();
            return to_route('category.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index')->with('success', __('messages.success'));
    }
}
