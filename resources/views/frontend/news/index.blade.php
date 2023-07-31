@extends("layouts.frontend")

@section("content")
    @section("body")
        blog blog-list right-sidebar
    @endsection
    @section("title")
        <title>@lang("messages.news")</title>
    @endsection
    <div id="page" class="hfeed site">
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <nav class="woocommerce-breadcrumb">
                <a href="{{route("home.index")}}">@lang("messages.home")</a>
                <span class="delimiter"><i class="fa fa-angle-right"></i></span>@lang("messages.news")
            </nav>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    @foreach($news as $news_)
                        <article class="post format-gallery hentry">

                            <div class="media-attachment">
                                <a href="{{route("news.show",$news_->id)}}">
                                    <img width="430" height="245" src="{{asset($news_->image)}}" class="wp-post-image" alt="{{$news_->alt}}" /></a>
                            </div><!-- .media-attachment -->

                            <div class="content-body">
                                <header class="entry-header">
                                    <h1 class="entry-title" itemprop="name headline">
                                        <a href="{{route("news.show",$news_->id)}}" rel="bookmark">{{$news_->title}}</a>
                                    </h1>

                                    <div class="entry-meta">
                                        <span class="posted-on">
                                            <a href="{{route("news.show",$news_->id)}}" rel="bookmark">
                                                <time class="entry-date published" datetime="2016-03-04T07:34:20+00:00">{{$news_->created_at}}</time>
                                            </a>
                                        </span>
                                    </div>
                                </header><!-- .entry-header -->
                                <div class="entry-content">
                                    <p>{{$news_->content}}</p>
                                </div>
                                <div class="post-readmore">
                                    <a href="{{route("news.show",$news_->id)}}" class="btn btn-primary">@lang("messages.readMore")</a>
                                </div><!-- .post-readmore -->
                            </div><!-- .content-body -->
                        </article><!-- #post-## -->
                    @endforeach
                    {{ $news->links() }}
                </main>
            </div><!-- /#primary -->

            <div id="sidebar" class="sidebar-blog" role="complementary">
                <aside class="widget electro_recent_posts_widget"><h3 class="widget-title">@lang("messages.lastNews")</h3>
                    <ul>
                        @foreach($last_news as $lastNews)
                            <li>
                                <a class="post-thumbnail" href="{{route("news.show",$lastNews->id)}}">
                                    <img width="150" height="150" src="{{asset($lastNews->image)}}"
                                         class="wp-post-image" alt="{{$lastNews->alt}}"/>
                                </a>
                                <div class="post-content">
                                    <a class ="post-name" href="{{route("news.show",$lastNews->id)}}">{{$lastNews->title}}</a>
                                    <span class="post-date">{{$lastNews->created_at}}</span>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                </aside>
            </div>
        </div><!-- /.container -->
    </div><!-- /.site-content -->
</div><!-- #page -->

@endsection
