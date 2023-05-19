<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
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
            if($request->hasFile('image')){
                $blog = Blog::create([
                    'author'=>$request->author,
                    'image'=>upload('blogs', $request->file('image')),
                ]);
                foreach (config('app.locales') as $key=>$lang) {
                    $translation = new BlogTranslation();
                    $translation->title = $request->title[$key];
                    $translation->content = $request->content[$key];
                    $translation->slug = $request->slug[$key];
                    $translation->locale = $key;
                    $translation->blog_id = $blog->id;
                    $translation->save();
                }
            }
            return to_route('blog.index')
                ->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', get_defined_vars());
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //
    }

    public function destroy(Blog $blog)
    {
        $imagePath = public_path($blog->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $blog->delete();
        return to_route('blog.index')
            ->with('success', __('messages.success'));
    }

}
