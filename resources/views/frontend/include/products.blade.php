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
                @foreach($products as $product)
                <div class="product">
                    <div class="product-outer">
                        <div class="product-inner">
                            <a href="single-product.html">
                                <h3>{{$product->title}}</h3>
                                <div class="product-thumbnail">
                                    <img src="{{asset("frontend/assets/images/blank.gif")}}"
                                         data-echo="{{asset($product->image)}}" class="img-responsive" alt="{{$product->alt}}">
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

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
