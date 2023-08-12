<div class="comments-area" id="comments">
    <h2 class="comments-title">{{$comments_count}} @lang("messages.comment")</h2>
    <ol class="comment-list">
        @forelse($comments as $comment)
            <li id="comment-396" class="comment even thread-even depth-1">
                <div class="media">
                    <div class="gravatar-wrapper media-left">
                        <img class="avatar avatar-100 photo" src="{{asset("frontend/assets/images/blog/avatar.jpg")}}" alt="avatar">
                    </div>
                    <div class="comment-body media-body">
                        <div class="comment-content" id="div-comment-396">
                            <p>{{$comment->comment}}</p>
                        </div>
                        <div class="comment-meta" id="div-comment-meta-396">
                            <div class="author vcard">
                                <cite class="fn media-heading">{{$comment->user_name}}</cite>
                            </div>

                            <div class="date">
                                <a class="comment-date" href="#">{{$comment->created_at}}</a>
                            </div>
                            <div class="reply">
                                <a aria-label=""
                                   onclick="return addComment.moveForm( &quot;div-comment-meta-396&quot;,
                                                       &quot;396&quot;, &quot;respond&quot;, &quot;2415&quot; )"
                                   href="#" class="comment-reply-link" rel="nofollow">
                                    @lang("messages.answer")
                                </a>
                            </div>
                        </div>
                    </div><!-- /.comment-body -->
                </div><!-- /.media -->
            </li><!-- #comment-## -->
        @empty
            <p>Şərh yoxdur</p>
        @endforelse
    </ol><!-- .comment-list -->

    <div class="comment-respond" id="respond">
        <h3 class="comment-reply-title" id="reply-title">@lang("messages.leaveComment")
            <small>
                <a style="display:none;" href="#" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a>
            </small>
        </h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ trans($error) }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route("comments.store")}}" method="post" class="comment-form" id="commentform">
            @csrf
            <input type="hidden" name="blog_id" value="{{$news->id}}">
            @auth
            @else
                <p class="comment-form-author">
                    <label for="author">@lang("messages.userName")<span class="required">*</span></label>
                    <input type="text" name="user_name" value="{{old("user_name")}}"
                           aria-required="true" maxlength="245" size="30" id="author" required>
                </p>
                <p class="comment-form-email">
                    <label for="email">@lang("messages.email") <span class="required">*</span></label>
                    <input type="email" name="email" value="{{old("email")}}"
                           aria-describedby="email-notes" maxlength="100" size="30" id="email" required>
                </p>
            @endauth
            <p class="comment-form-comment">
                <label for="comment">@lang("messages.comment")<span class="required">*</span></label>
                <textarea name="comment" maxlength="65525" rows="8" cols="45"  id="comment" required>{{old("comment")}}</textarea>
            </p>
            <p class="form-submit">
                <input type="submit" value="@lang("messages.submit")" class="submit">
            </p>
        </form>
    </div><!-- #respond -->
</div>
