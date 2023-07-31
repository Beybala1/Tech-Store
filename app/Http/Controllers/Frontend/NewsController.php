<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Comment;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = Blog::latest()->paginate(5);
        $last_news = Blog::limit(5)->get();
        $comments_count = Comment::count();
        return view("frontend.news.index",get_defined_vars());
    }

    public function show($id)
    {
        $news = Blog::with("blogTranslations")->where('id', $id)->firstOrFail();
        $news_ = Blog::with("blogTranslations")->limit(5)->get();
        $comments = Comment::where("blog_id", $id)->get();
        $comments_count = Comment::where("blog_id", $id)->count();
        return view('frontend.news.show',get_defined_vars());
    }
}
