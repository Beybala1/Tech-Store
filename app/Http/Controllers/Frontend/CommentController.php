<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        try {
            Comment::create([
                'user_name'=>$request->user_name,
                'email'=>$request->email,
                'comment'=>$request->comment,
                'blog_id'=>$request->blog_id,
            ]);
            return back()->with('success', __('messages.successComment'));
        } catch (\Exception) {
            return back()->with('warning', __('messages.failComment'));
        }
    }

    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
