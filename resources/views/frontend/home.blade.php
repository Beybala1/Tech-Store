@extends("layouts.frontend")
@section("content")
    @section("body")
        home-v2
    @endsection
    @section("title")
        <title>@lang("messages.home")</title>
    @endsection
    @section("description")
        <title>@lang("messages.description")</title>
    @endsection

    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="home-v2-slider" >
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            @foreach($sliders as $slider)
                                <div class="item" style="background-image: url({{$slider->image}});">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-5">
                                                <div class="caption vertical-center text-left">
                                                    <div class="hero-subtitle-v2 fadeInLeft-1">
                                                        {{$slider->title}}
                                                    </div>

                                                    <div class="hero-2 fadeInRight-1">
                                                        {{$slider->content}}
                                                    </div>

                                                    <div class="hero-action-btn fadeInLeft-2">
                                                        <a href="single-product.html" class="big le-button ">Start Buying</a>
                                                    </div>
                                                </div><!-- /.caption -->
                                            </div>
                                        </div>
                                    </div><!-- /.container -->
                                </div><!-- /.item -->
                            @endforeach
                        </div><!-- /.owl-carousel -->
                    </div><!-- /.home-v1-slider -->
                    @include("frontend.include.products")
                </main><!-- #main -->
            </div><!-- #primary -->

            <div id="sidebar" class="sidebar" role="complementary" style="margin-top: 778px;">
                <aside class="widget widget_text">
                    <div class="textwidget">
                        <a href="#">
                            <img src="{{asset("frontend/assets/images/banner/ad-banner-sidebar.jpg")}}" alt="Banner">
                        </a>
                    </div>
                </aside>
                <aside class="widget widget_products">
                    <h3 class="widget-title">@lang("messages.latestProducts")</h3>
                    <ul class="product_list_widget">
                        @foreach($products_latest as $product_latest)
                            <li>
                                <a href="single-product.html" title="Notebook Black Spire V Nitro  VN7-591G">
                                    <img width="180" height="180" src="{{asset($product_latest->image)}}"
                                         alt="{{$product_latest->alt}}" class="wp-post-image"/>
                                    <span class="product-title">{{$product_latest->title}}</span>
                                </a>
                                <span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
                            </li>
                        @endforeach
                    </ul>
                </aside>
                <aside id="electro_features_block_widget-2" class="widget widget_electro_features_block_widget">
                    <div class="features-list columns-1">
                        @foreach($services as $service)
                            <div class="feature">
                                <div class="media">
                                    <div class="media-left media-middle feature-icon">
                                        <i class="ec ec-tag"></i>
                                    </div>
                                    <div class="media-body media-middle feature-text">
                                        <strong>{{$service->title}}</strong>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </aside>
                <aside class="widget electro_posts_carousel_widget">
                    <section class="section-posts-carousel">
                        <header>

                            <h3 class="widget-title">@lang("messages.news")</h3>
                            <div class="owl-nav">
                                <a href="#posts-carousel-prev" data-target="#posts-carousel-57176fb2e4a7f" class="slider-prev"><i class="fa fa-angle-left"></i></a>
                                <a href="#posts-carousel-next" data-target="#posts-carousel-57176fb2e4a7f" class="slider-next"><i class="fa fa-angle-right"></i></a>
                            </div>

                        </header>

                        <div id="posts-carousel-57176fb2e4a7f" class="blog-carousel-homev2">
                            <div class="owl-carousel post-carousel blog-carousel-widget">
                                @foreach($blogs as $blog)
                                    <div class="post-item">
                                        <a class="post-thumbnail" href="{{ route("news.show", $blog->id) }}">
                                            <div class="electro-img-placeholder">
                                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->alt }}">
                                                <i class="fa fa-paragraph"></i>
                                            </div>
                                        </a>
                                        <div class="post-content">
                                            <span class="post-category">{{ $blog->created_at }}<a href="blog-single.html"></a></span>
                                            <span class="post-date"></span>
                                            <a class="post-name" href="{{ route("news.show", $blog->id) }}">{{ $blog->title }}</a>
                                            <span class="comments-link"><a href="{{ route("news.show", $blog->id) }}">@lang("messages.leaveComment")</a></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </section>
                </aside>
            </div>
        </div><!-- .container -->
    </div><!-- #content -->

@endsection
