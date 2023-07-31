<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\BlogTranslation;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('backend.blog.index', get_defined_vars());
    }

    public function create()
    {
        return view('backend.blog.create');
    }

    public function store(Request $request)
    {
        try {
            if ($request->hasFile('image')) {
                $blog = Blog::create([
                    'image' => upload('blogs', $request->file('image')),
                ]);
                foreach (lang() as $language) {
                    $translation = new BlogTranslation();
                    $translation->title = $request->title[$language->code];
                    $translation->description = $request->description[$language->code];
                    $translation->alt = $request->alt[$language->code];
                    $translation->slug = $request->slug[$language->code];
                    $translation->locale = $language->code;
                    $translation->blog_id = $blog->id;
                    $translation->save();
                }
            }
            return to_route('blog.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', get_defined_vars());
    }

    public function update(Request $request, Blog $blog)
    {
        try {
            if ($request->hasFile('image')) {
                $imagePath = public_path($blog->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $blog->image = upload('blogs', $request->file('image'));
            }
            foreach (lang() as $language) {
                $translationData = [
                    'title' => $request->title[$language->code],
                    'description' => $request->description[$language->code],
                    'alt' => $request->alt[$language->code],
                    'slug' => $request->slug[$language->code],
                    'locale' => $language->code,
                ];
                $blog->translations()->updateOrCreate(['locale' => $language->code], $translationData);
            }

            $blog->save();
            return to_route('blog.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }


    public function destroy(Blog $blog)
    {
        $imagePath = public_path($blog->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $blog->delete();
        return to_route('blog.index')->with('success', __('messages.success'));
    }
}
