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
                    <section class="home-v2-categories-products-carousel section-products-carousel animate-in-view fadeIn animated animation" data-animation="fadeIn">
                        <header>

                            <h2 class="h1">@lang("messages.products")</h2>

                            <div class="owl-nav">
                                <a href="#products-carousel-prev" data-target="#products-carousel-57176fb2c4230" class="slider-prev"><i class="fa fa-angle-left"></i></a>
                                <a href="#products-carousel-next" data-target="#products-carousel-57176fb2c4230" class="slider-next"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </header>
                        <div id="products-carousel-57176fb2c4230">
                            <div class="woocommerce">
                                <div class="products owl-carousel home-v2-categories-products products-carousel columns-6">

                                    <div class="product">
                                        <div class="product-outer">
                                            <div class="product-inner">
                                                <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                                <a href="single-product.html">
                                                    <h3>Laptop Yoga 21 80JH0035GE  W8.1 (Copy)</h3>
                                                    <div class="product-thumbnail">
                                                        <img src="{{asset("frontend/assets/images/blank.gif")}}" data-echo="{{asset("frontend/assets/images/product-category/5.jpg")}}" class="img-responsive" alt="">
                                                    </div>
                                                </a>

                                                <div class="price-add-to-cart">
                                                            <span class="price">
                                                                <span class="electro-price">
                                                                    <ins><span class="amount"> </span></ins>
                                                                    <span class="amount"> $1,999.00</span>
                                                                </span>
                                                            </span>
                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->

                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link"> Compare</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-inner -->
                                        </div><!-- /.product-outer -->
                                    </div><!-- /.products -->

                                    <div class="product">
                                        <div class="product-outer">
                                            <div class="product-inner">
                                                <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                                <a href="single-product.html">
                                                    <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                                    <div class="product-thumbnail">
                                                        <img src="{{asset("frontend/assets/images/blank.gif")}}" data-echo="{{asset("frontend/assets/images/product-category/1.jpg")}}" class="img-responsive" alt="">
                                                    </div>
                                                </a>

                                                <div class="price-add-to-cart">
                                                            <span class="price">
                                                                <span class="electro-price">
                                                                    <ins><span class="amount"> </span></ins>
                                                                    <span class="amount"> $1,999.00</span>
                                                                </span>
                                                            </span>
                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->

                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link"> Compare</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-inner -->
                                        </div><!-- /.product-outer -->
                                    </div><!-- /.products -->

                                    <div class="product">
                                        <div class="product-outer">
                                            <div class="product-inner">
                                                <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                                <a href="single-product.html">
                                                    <h3>Notebook Purple G952VX-T7008T</h3>
                                                    <div class="product-thumbnail">
                                                        <img src="{{asset("frontend/assets/images/blank.gif")}}" data-echo="{{asset("frontend/assets/images/product-category/4.jpg")}}" class="img-responsive" alt="">
                                                    </div>
                                                </a>

                                                <div class="price-add-to-cart">
                                                            <span class="price">
                                                                <span class="electro-price">
                                                                    <ins><span class="amount"> </span></ins>
                                                                    <span class="amount"> $1,999.00</span>
                                                                </span>
                                                            </span>
                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->

                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link"> Compare</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-inner -->
                                        </div><!-- /.product-outer -->
                                    </div><!-- /.products -->



                                    <div class="product">
                                        <div class="product-outer">
                                            <div class="product-inner">
                                                <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                                <a href="single-product.html">
                                                    <h3>Notebook Widescreen Z51-70  40K6013UPB</h3>
                                                    <div class="product-thumbnail">
                                                        <img src="{{asset("frontend/assets/images/blank.gif")}}" data-echo="{{asset("frontend/assets/images/product-category/3.jpg")}}" class="img-responsive" alt="">
                                                    </div>
                                                </a>

                                                <div class="price-add-to-cart">
                                                            <span class="price">
                                                                <span class="electro-price">
                                                                    <ins><span class="amount"> $1,999.00</span></ins>
                                                                    <del><span class="amount">$2,299.00</span></del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                            </span>
                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->

                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link"> Compare</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-inner -->
                                        </div><!-- /.product-outer -->
                                    </div><!-- /.products -->



                                    <div class="product">
                                        <div class="product-outer">
                                            <div class="product-inner">
                                                <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                                <a href="single-product.html">
                                                    <h3>Notebook Purple G952VX-T7008T</h3>
                                                    <div class="product-thumbnail">
                                                        <img src="{{asset("frontend/assets/images/blank.gif")}}" data-echo="{{asset("frontend/assets/images/product-category/3.jpg")}}" class="img-responsive" alt="">
                                                    </div>
                                                </a>

                                                <div class="price-add-to-cart">
                                                            <span class="price">
                                                                <span class="electro-price">
                                                                    <ins><span class="amount"> </span></ins>
                                                                    <span class="amount"> $1,999.00</span>
                                                                </span>
                                                            </span>
                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->

                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link"> Compare</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-inner -->
                                        </div><!-- /.product-outer -->
                                    </div><!-- /.products -->



                                    <div class="product">
                                        <div class="product-outer">
                                            <div class="product-inner">
                                                <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                                <a href="single-product.html">
                                                    <h3>Tablet Thin EliteBook  Revolve 810 G6</h3>
                                                    <div class="product-thumbnail">
                                                        <img src="{{asset("frontend/assets/images/blank.gif")}}" data-echo="{{asset("frontend/assets/images/product-category/2.jpg")}}" class="img-responsive" alt="">
                                                    </div>
                                                </a>

                                                <div class="price-add-to-cart">
                                                            <span class="price">
                                                                <span class="electro-price">
                                                                    <ins><span class="amount"> </span></ins>
                                                                    <span class="amount"> $1,999.00</span>
                                                                </span>
                                                            </span>
                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->

                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link"> Compare</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-inner -->
                                        </div><!-- /.product-outer -->
                                    </div><!-- /.products -->



                                    <div class="product">
                                        <div class="product-outer">
                                            <div class="product-inner">
                                                <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                                <a href="single-product.html">
                                                    <h3>Tablet Thin EliteBook  Revolve 810 G6</h3>
                                                    <div class="product-thumbnail">
                                                        <img src="{{asset("frontend/assets/images/blank.gif")}}" data-echo="{{asset("frontend/assets/images/product-category/2.jpg")}}" class="img-responsive" alt="">
                                                    </div>
                                                </a>

                                                <div class="price-add-to-cart">
                                                            <span class="price">
                                                                <span class="electro-price">
                                                                    <ins><span class="amount"> $1,999.00</span></ins>
                                                                    <del><span class="amount">$2,299.00</span></del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                            </span>
                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->

                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link"> Compare</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-inner -->
                                        </div><!-- /.product-outer -->
                                    </div><!-- /.products -->

                                    <div class="product">
                                        <div class="product-outer">
                                            <div class="product-inner">
                                                <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                                <a href="single-product.html">
                                                    <h3>Smartphone 6S 128GB LTE</h3>
                                                    <div class="product-thumbnail">
                                                        <img src="{{asset("frontend/assets/images/blank.gif")}}" data-echo="{{asset("frontend/assets/images/product-category/6.jpg")}}" class="img-responsive" alt="">
                                                    </div>
                                                </a>

                                                <div class="price-add-to-cart">
                                                            <span class="price">
                                                                <span class="electro-price">
                                                                    <ins><span class="amount"> </span></ins>
                                                                    <span class="amount"> $200.00</span>
                                                                </span>
                                                            </span>
                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->

                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link"> Compare</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-inner -->
                                        </div><!-- /.product-outer -->
                                    </div><!-- /.products -->


                                </div>
                            </div>
                        </div>
                    </section>
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
                        <li>
                            <a href="single-product.html" title="Notebook Black Spire V Nitro  VN7-591G">
                                <img width="180" height="180" src="{{asset("frontend/assets/images/product-category/1.jpg")}}" alt="" class="wp-post-image"/><span class="product-title">Notebook Black Spire V Nitro  VN7-591G</span>
                            </a>
                            <span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
                        </li>

                        <li>
                            <a href="single-product.html" title="Tablet Thin EliteBook  Revolve 810 G6">
                                <img width="180" height="180" src="{{asset("frontend/assets/images/product-category/2.jpg")}}" alt="" class="wp-post-image"/><span class="product-title">Tablet Thin EliteBook  Revolve 810 G6</span>
                            </a>
                            <span class="electro-price"><span class="amount">&#36;1,300.00</span></span>
                        </li>

                        <li>
                            <a href="single-product.html" title="Notebook Widescreen Z51-70  40K6013UPB">
                                <img width="180" height="180" src="{{asset("frontend/assets/images/product-category/3.jpg")}}" alt="" class="wp-post-image"/><span class="product-title">Notebook Widescreen Z51-70  40K6013UPB</span>
                            </a>
                            <span class="electro-price"><span class="amount">&#36;1,100.00</span></span>
                        </li>

                        <li>
                            <a href="single-product.html" title="Notebook Purple G952VX-T7008T">
                                <img width="180" height="180" src="{{asset("frontend/assets/images/product-category/4.jpg")}}" alt="" class="wp-post-image"/><span class="product-title">Notebook Purple G952VX-T7008T</span>
                            </a>
                            <span class="electro-price"><span class="amount">&#36;2,780.00</span></span>
                        </li>
                    </ul>
                </aside>
                <aside id="electro_features_block_widget-2" class="widget widget_electro_features_block_widget">
                    <div class="features-list columns-1">
                        <div class="feature">
                            <div class="media">
                                <div class="media-left media-middle feature-icon">
                                    <i class="ec ec-transport"></i>
                                </div>
                                <div class="media-body media-middle feature-text">
                                    <strong>Free Delivery</strong> from $50
                                </div>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="media">
                                <div class="media-left media-middle feature-icon">
                                    <i class="ec ec-customers"></i>
                                </div>
                                <div class="media-body media-middle feature-text">
                                    <strong>99% Positive</strong> Feedbacks
                                </div>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="media">
                                <div class="media-left media-middle feature-icon">
                                    <i class="ec ec-returning"></i>
                                </div>
                                <div class="media-body media-middle feature-text">
                                    <strong>365 days</strong> for free return
                                </div>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="media">
                                <div class="media-left media-middle feature-icon">
                                    <i class="ec ec-payment"></i>
                                </div>
                                <div class="media-body media-middle feature-text">
                                    <strong>Payment</strong> Secure System
                                </div>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="media">
                                <div class="media-left media-middle feature-icon">
                                    <i class="ec ec-tag"></i>
                                </div>
                                <div class="media-body media-middle feature-text">
                                    <strong>Only Best</strong> Brands
                                </div>
                            </div>
                        </div>
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
                                <div class="post-item">
                                    <a class="post-thumbnail" href="blog-single.html">
                                        <img width="270" height="180" src="{{asset("frontend/assets/images/blog/blog-1.jpg")}}" class="wp-post-image" alt="1"/>
                                    </a>
                                    <div class="post-content">
                                        <span class="post-category"><a href="blog-single.html" rel="category tag">Design</a>, <a href="blog-single.html" rel="category tag">Technology</a></span> -
                                        <span class="post-date">March 4, 2016</span>
                                        <a class ="post-name" href="blog-single.html">Robot Wars &#8211; Post with Gallery</a>
                                        <span class="comments-link"><a href="blog-single.html#comments">@lang("messages.comment")</a></span>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <a class="post-thumbnail" href="blog-single.html">
                                        <img width="270" height="138" src="{{asset("frontend/assets/images/blog/blog-2.jpg")}}" class="wp-post-image" alt="6" />
                                    </a>
                                    <div class="post-content">
                                        <span class="post-category"><a href="blog-single.html" rel="category tag">Design</a>, <a href="blog-single.html" rel="category tag">News</a>, <a href="blog-single.html" rel="category tag">Uncategorized</a></span> -
                                        <span class="post-date">March 3, 2016</span>
                                        <a class ="post-name" href="blog-single.html">Robot Wars &#8211; Now Closed &#8211; Post with Audio</a>
                                        <span class="comments-link"><a href="blog-single.html#comments">Leave a comment</a></span>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <a class="post-thumbnail" href="blog-single.html">
                                        <img width="270" height="152" src="{{asset("frontend/assets/images/blog/blog-3.jpg")}}" class="attachment-electro_blog_carousel size-electro_blog_carousel wp-post-image" alt="video-format"/>
                                    </a>
                                    <div class="post-content">
                                        <span class="post-category"><a href="blog-single.html" rel="category tag">Videos</a></span> -
                                        <span class="post-date">March 3, 2016</span>
                                        <a class ="post-name" href="blog-single.html">Robot Wars &#8211; Now Closed &#8211; Post with Video</a>
                                        <span class="comments-link"><a href="blog-single.html#comments">Leave a comment</a></span>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <a class="post-thumbnail" href="blog-single.html">
                                        <div class="electro-img-placeholder"><img src="http://placehold.it/270x180/DDD/DDD/" alt=""><i class="fa fa-paragraph"></i></div>
                                    </a>
                                    <div class="post-content">
                                        <span class="post-category"><a href="blog-single.html" rel="category tag">Events</a>, <a href="blog-single.html" rel="category tag">News</a></span> -
                                        <span class="post-date">March 2, 2016</span>
                                        <a class ="post-name" href="blog-single.html">Announcement &#8211; Post without Image</a>
                                        <span class="comments-link"><a href="blog-single.html#comments">Leave a comment</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div><!-- .container -->
    </div><!-- #content -->

@endsection
