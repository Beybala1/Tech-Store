@extends("layouts.frontend")
@section("content")
    @section("title")
        <title>
                {{$altSubCategory->title}}

        </title>
    @endsection
    @section("body")
        left-sidebar
    @endsection
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <nav class="woocommerce-breadcrumb" >
                <a href="{{route('home.index')}}">@lang("messages.home")</a>
                <span class="delimiter">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    {{$altSubCategory->title}}

            </nav>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <header class="page-header">
                        <h1 class="page-title">
                                {{$altSubCategory->title}}

                        </h1>
                        <p class="woocommerce-result-count">Showing 1&ndash;15 of 20 results</p>
                    </header>
                    <div class="shop-control-bar">
                        <ul class="shop-view-switcher nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
                            <li class="nav-item"><a class="nav-link " data-toggle="tab" title="Grid Extended View" href="#grid-extended"><i class="fa fa-align-justify"></i></a></li>
                            <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
                            <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                        <form class="woocommerce-ordering" method="get">
                            <select name="orderby" class="orderby">
                                <option value="menu_order"  selected='selected'>Default sorting</option>
                                <option value="popularity" >Sort by popularity</option>
                                <option value="rating" >Sort by average rating</option>
                                <option value="date" >Sort by newness</option>
                                <option value="price" >Sort by price: low to high</option>
                                <option value="price-desc" >Sort by price: high to low</option>
                            </select>
                        </form>
                        <form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>
                        <nav class="electro-advanced-pagination">
                            <form method="post" class="form-adv-pagination"><input id="goto-page" size="2" min="1" max="2" step="1" type="number" class="form-control" value="1" /></form> of 2<a class="next page-numbers" href="#">&rarr;</a>         <script>
                                jQuery(document).ready(function($){
                                    $( '.form-adv-pagination' ).on( 'submit', function() {
                                        var link        = '#',
                                            goto_page   = $( '#goto-page' ).val(),
                                            new_link    = link.replace( '%#%', goto_page );

                                        window.location.href = new_link;
                                        return false;
                                    });
                                });
                            </script>
                        </nav>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="grid" aria-expanded="true">
                            <ul class="products columns-3">
                                @foreach($paginatedProducts as $product)
                                    <li class="product">
                                        <div class="product-outer">
                                            <div class="product-inner">
                                                    <span class="loop-product-categories">
                                                        <a href="{{ route('product.show', $product->id) }}" rel="tag">{{ $altSubCategory->title }}</a>
                                                    </span>
                                                <a href="{{ route('product.show', $product->id) }}">
                                                    <h3>{{ $product->title }}</h3>
                                                    <div class="product-thumbnail">
                                                        <img data-echo="{{ asset($product->image) }}" src="assets/images/blank.gif" alt="{{ $product->alt }}">
                                                    </div>
                                                </a>
                                                <div class="price-add-to-cart">
                                                        <span class="price">
                                                            <span class="electro-price">
                                                                <ins><span class="amount">&#8380; {{ $product->price }}</span></ins>
                                                                <del><span class="amount">&#8380; {{ $product->price }}</span></del>
                                                            </span>
                                                        </span>
                                                    <a rel="nofollow" href="{{--{{ route('product.addToCart', $product->id) }}--}}" class="button add_to_cart_button">@lang("messages.add_to_cart")</a>
                                                </div>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <a href="#" rel="nofollow" class="add_to_wishlist">@lang("messages.wishlist")</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.product-inner -->
                                        </div><!-- /.product-outer -->
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                                                <div role="tabpanel" class="tab-pane" id="grid-extended" aria-expanded="true">
                                                    <ul class="products columns-3">
                                                            @foreach($paginatedProducts as $product)
                                                                <li class="product">
                                                                    <div class="product-outer">
                                                                        <div class="product-inner">
                                                                                <span class="loop-product-categories">
                                                                                    <a href="product-category.html" rel="tag">
                                                                                        {{$altSubCategory->title}}
                                                                                    </a>
                                                                                </span>
                                                                            <a href="single-product.html">
                                                                                <h3>{{$product->title}}</h3>
                                                                                <div class="product-thumbnail">
                                                                                    <img class="wp-post-image" data-echo="{{asset($product->image)}}" src="assets/images/blank.gif" alt="">
                                                                                </div>

                                                                                <div class="product-rating">
                                                                                    <div title="Rated 4 out of 5" class="star-rating">
                                                                                            <span style="width:80%">
                                                                                                <strong class="rating">4</strong> out of 5
                                                                                            </span>
                                                                                    </div> (3)
                                                                                </div>

                                                                                <div class="product-short-description">
                                                                                    <ul>
                                                                                        <li><span class="a-list-item">{{$product->description}}</span></li>
                                                                                    </ul>
                                                                                </div>

                                                                            </a>
                                                                            <div class="price-add-to-cart">
                                                                                        <span class="price">
                                                                                            <span class="electro-price">
                                                                                                <ins><span class="amount">&#8380; {{$product->price}}</span></ins>
                                                                                                <del><span class="amount">&#8380; {{$product->price}}</span></del>
                                                                                            </span>
                                                                                        </span>
                                                                                <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                                            </div><!-- /.price-add-to-cart -->

                                                                            <div class="hover-area">
                                                                                <div class="action-buttons">
                                                                                    <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                                                    <a href="#" class="add-to-compare-link">Compare</a>
                                                                                </div>
                                                                            </div>

                                                                        </div><!-- /.product-inner -->
                                                                    </div><!-- /.product-outer -->
                                                                </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="list-view" aria-expanded="true">
                                                    <ul class="products columns-3">
                                                            @foreach($paginatedProducts as $product)
                                                                <li class="product list-view">
                                                                    <div class="media">
                                                                        <div class="media-left">
                                                                            <a href="single-product.html">
                                                                                <img class="wp-post-image" data-echo="{{asset($product->image)}}" src="assets/images/blank.gif" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="media-body media-middle">
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                        <span class="loop-product-categories">
                                                                                            <a rel="tag" href="#">{{$altSubCategory->title}}</a>
                                                                                        </span>
                                                                                    <a href="single-product.html"><h3>{{$product->title}}</h3>
                                                                                        <div class="product-rating">
                                                                                            <div title="Rated 4 out of 5" class="star-rating">
                                                                                                <span style="width:80%"><strong class="rating">4</strong> out of 5</span>
                                                                                            </div> (3)
                                                                                        </div>
                                                                                        <div class="product-short-description">
                                                                                            <ul style="padding-left: 18px;">
                                                                                                <li>{{$product->description}}</li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-xs-12">

                                                                                    <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                                                    <span class="price"><span class="electro-price"><span class="amount">&#8380; {{$product->price}}</span></span></span>
                                                                                    <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                                                    <div class="hover-area">
                                                                                        <div class="action-buttons">
                                                                                            <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                                                                <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                                                                <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                                                    <span class="feedback">Product added!</span>
                                                                                                    <a rel="nofollow" href="#">Wishlist</a>
                                                                                                </div>

                                                                                                <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                                                    <span class="feedback">The product is already in the wishlist!</span>
                                                                                                    <a rel="nofollow" href="#">Wishlist</a>
                                                                                                </div>

                                                                                                <div style="clear:both"></div>
                                                                                                <div class="yith-wcwl-wishlistaddresponse"></div>

                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                            <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="list-view-small" aria-expanded="true">
                                                    <ul class="products columns-3">
                                                            @foreach($paginatedProducts as $product)
                                                                <li class="product list-view list-view-small">
                                                                    <div class="media">
                                                                        <div class="media-left">
                                                                            <a href="single-product.html">
                                                                                <img class="wp-post-image" data-echo="{{asset($product->image)}}" src="assets/images/blank.gif" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="media-body media-middle">
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                        <span class="loop-product-categories">
                                                                                            <a rel="tag" href="product-category.html">{{$altSubCategory->title}}</a>
                                                                                        </span>
                                                                                    <a href="product-category.html">
                                                                                        <h3>{{$product->title}}</h3>
                                                                                        <div class="product-short-description">
                                                                                            <ul style="padding-left: 18px;">
                                                                                                <li>{{$product->description}}</li>
                                                                                            </ul>
                                                                                        </div>
                                                                                        <div class="product-rating">
                                                                                            <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-xs-12">
                                                                                    <div class="price-add-to-cart">
                                                                                        <span class="price"><span class="electro-price"><span class="amount">&#8380; {{$product->price}}</span></span></span>
                                                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                                    </div><!-- /.price-add-to-cart -->

                                                                                    <div class="hover-area">
                                                                                        <div class="action-buttons">
                                                                                            <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                                                            <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                    </ul>
                                                </div>
                    </div>
                    <div class="shop-control-bar-bottom">
                        <form class="form-electro-wc-ppp">
                            <select class="electro-wc-wppp-select c-select" onchange="this.form.submit()" name="ppp"><option selected="selected" value="15">Show 15</option><option value="-1">Show All</option></select>
                        </form>
                        <p class="woocommerce-result-count">Showing 1&ndash;15 of 20 results</p>
                        <nav class="woocommerce-pagination">
                            <ul class="page-numbers">
                                {{ $paginatedProducts->links() }}
                            </ul>
                        </nav>
                    </div>
                </main><!-- #main -->
            </div><!-- #primary -->
            <div id="sidebar" class="sidebar" role="complementary">
                <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
                    <ul class="product-categories category-single">
                        <li class="product_cat">
                            <ul>
                                <li class="cat-item current-cat">
                                    <a href="product-category.html">
                                        <span class="child-indicator open">
                                            <i class="fa fa-angle-up"></i>
                                        </span>
                                        {{$altSubCategory->title}}
                                    </a>
                                    <ul class="children" style="display: block;">
                                        @foreach($allProductLists as $allProductList)
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="no-child"></span>
                                                {{$allProductList->title}}
                                            </a>
                                            <span class="count">(6)</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </aside>
                <aside class="widget widget_electro_products_filter">
                    <h3 class="widget-title">Filters</h3>
                    <aside class="widget woocommerce widget_layered_nav">
                        <h3 class="widget-title">Brands</h3>
                        <ul>
                            <li style=""><a href="#">Apple</a> <span class="count">(4)</span></li>
                            <li style=""><a href="#">Gionee</a> <span class="count">(2)</span></li>
                            <li style=""><a href="#">HTC</a> <span class="count">(2)</span></li>
                            <li style=""><a href="#">LG</a> <span class="count">(2)</span></li>
                            <li style=""><a href="#">Micromax</a> <span class="count">(1)</span></li>
                        </ul>
                        <p class="maxlist-more"><a href="#">+ Show more</a></p>
                    </aside>
                    <aside class="widget woocommerce widget_layered_nav">
                        <h3 class="widget-title">Color</h3>
                        <ul>
                            <li style=""><a href="#">Black</a> <span class="count">(4)</span></li>
                            <li style=""><a href="#">Black Leather</a> <span class="count">(2)</span></li>
                            <li style=""><a href="#">Turquoise</a> <span class="count">(2)</span></li>
                            <li style=""><a href="#">White</a> <span class="count">(4)</span></li>
                            <li style=""><a href="#">Gold</a> <span class="count">(4)</span></li>
                        </ul>
                        <p class="maxlist-more"><a href="#">+ Show more</a></p>
                    </aside>
                    <aside class="widget woocommerce widget_price_filter">
                        <h3 class="widget-title">Price</h3>
                        <form action="#">
                            <div class="price_slider_wrapper">
                                <div style="" class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;"></span>
                                </div>
                                <div class="price_slider_amount">
                                    <a href="#" class="button">Filter</a>
                                    <div style="" class="price_label">Price: <span class="from">$428</span> — <span class="to">$3485</span></div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>
                    </aside>
                </aside>
            </div>
    </div>
    </div>
@endsection
