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
            //If the user exists, then get the user's name and email, otherwise, enter the name and email himself
            $user_name = auth()->check() ? auth()->user()->name : $request->user_name;
            $email = auth()->check() ? auth()->user()->email : $request->email;

            Comment::create([
                'user_name' => $user_name,
                'email' => $email,
                'comment' => $request->comment,
                'blog_id' => $request->blog_id,
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
