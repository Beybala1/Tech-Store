@extends("layouts.frontend")

@section("content")
    @section("body")
        single-post right-sidebar
    @endsection
    @section("title")
        <title>{{$news->title}}</title>
    @endsection
    @include('sweetalert::alert')
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <nav itemprop="breadcrumb" class="woocommerce-breadcrumb"><a href="{{route("home.index")}}">@lang("messages.home")</a>
                <span class="delimiter"><i class="fa fa-angle-right"></i></span>{{$news->title}}</nav>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article class="post type-post status-publish format-gallery has-post-thumbnail hentry" >
                        <div class="media-attachment">
                            <div class="media-attachment-gallery">
                                <div class=" ">
                                    <div class="item">
                                        <figure>
                                            <img width="1144" height="600" src="{{asset($news->image)}}"
                                                 class="attachment-post-thumbnail size-post-thumbnail" alt="{{$news->alt}}" />
                                        </figure>
                                    </div><!-- /.item -->
                                </div>
                            </div><!-- /.media-attachment-gallery -->
                        </div>

                        <header class="entry-header">
                            <h1 class="entry-title" itemprop="name headline">{{$news->title}}
                                <span class="comments-link"><a href="#comments">@lang("messages.leaveComment")</a></span>
                            </h1>

                            <div class="entry-meta">
                                <span class="posted-on"><a href="#" rel="bookmark">
                                        <time class="entry-date published">{{$news->created_at}}</time>
                            </div>
                        </header><!-- .entry-header -->

                        <div class="entry-content" itemprop="articleBody">
                            <p>
                                {{$news->description}}
                            </p>
                        </div><!-- .entry-content -->
                    </article>
                    <a href="#"></a>
                    @include("frontend.include.comment")
                </main>
            </div>
            <div id="sidebar" class="sidebar-blog" role="complementary">
                <aside class="widget electro_recent_posts_widget"><h3 class="widget-title">@lang("messages.lastNews")</h3>
                    <ul>
                        @foreach($news_ as $_news)
                            <li>
                                <a class="post-thumbnail" href="{{route("news.show",$_news->id)}}">
                                    <img width="150" height="150" src="{{asset( $_news->image)}}" class="wp-post-image" alt="{{$news->alt}}" />
                                </a>
                                <div class="post-content">
                                    <a class ="post-name" href="{{route("news.show",$_news->id)}}">{{ $_news->title }}</a>
                                    <span class="post-date">{{ $_news->created_at }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            </div>
        </div>
    </div>
@endsection
