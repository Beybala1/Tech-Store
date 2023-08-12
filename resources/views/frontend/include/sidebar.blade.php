<nav class="navbar navbar-primary navbar-full hidden-md-down">
    <div class="container">
        <ul class="nav navbar-nav departments-menu animate-dropdown">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="departm ents-menu-toggle" >@lang("messages.products")</a>
                <ul id="menu-vertical-menu" class="dropdown-menu yamm departments-menu-dropdown">
                    @foreach($categories as $category)
                    <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown menu-item-2590 dropdown">
                        <a title="{{$category->title}}" href="product-category.html" data-toggle="dropdown"
                           class="dropdown-toggle" aria-haspopup="true">{{$category->title}}</a>
                        <ul role="menu" class=" dropdown-menu">
                            <li class="menu-item animate-dropdown menu-item-object-static_block">
                                <div class="yamm-content">
                                    <div class="vc_row row wpb_row vc_row-fluid">
                                        @foreach($category->altCategories as $altCategory)
                                            <div class="wpb_column vc_column_container vc_col-sm-6 col-sm-6">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                                <ul>
                                                                    <li class="nav-title">{{$altCategory->title}}</li>
                                                                    @foreach($altCategory->altSubCategories as $altSubCategory)
                                                                        <li>
                                                                            <a href="{{ route('alt-sub-category.show', $altSubCategory->slug) }}">
                                                                                {{ $altSubCategory->title }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        @include("frontend.include.search")

        <ul class="navbar-mini-cart navbar-nav animate-dropdown nav pull-right flip">
            <li class="nav-item dropdown">
                <a href="cart.html" class="nav-link" data-toggle="dropdown">
                    <i class="ec ec-shopping-bag"></i>
                    <span class="cart-items-count count">4</span>
                    <span class="cart-items-total-price total-price"><span class="amount">&#36;1,215.00</span></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-mini-cart">
                    <li>
                        <div class="widget_shopping_cart_content">
                            <ul class="cart_list product_list_widget ">
                                <li class="mini_cart_item">
                                    <a title="Remove this item" class="remove" href="#">×</a>
                                    <a href="single-product.html">
                                        <img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="assets/images/products/mini-cart1.jpg" alt="">White lumia 9001&nbsp;
                                    </a>

                                    <span class="quantity">2 × <span class="amount">£150.00</span></span>
                                </li>
                                <li class="mini_cart_item">
                                    <a title="Remove this item" class="remove" href="#">×</a>
                                    <a href="single-product.html">
                                        <img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="assets/images/products/mini-cart2.jpg" alt="">PlayStation 4&nbsp;
                                    </a>

                                    <span class="quantity">1 × <span class="amount">£399.99</span></span>
                                </li>
                                <li class="mini_cart_item">
                                    <a data-product_sku="" data-product_id="34" title="Remove this item" class="remove" href="#">×</a>
                                    <a href="single-product.html">
                                        <img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="assets/images/products/mini-cart3.jpg" alt="">POV Action Cam HDR-AS100V&nbsp;
                                    </a>
                                    <span class="quantity">1 × <span class="amount">£269.99</span></span>
                                </li>
                            </ul><!-- end product list -->
                            <p class="total"><strong>Subtotal:</strong> <span class="amount">£969.98</span></p>
                            <a class="button wc-forward" href="cart.html">View Cart</a>
                            <a class="button checkout wc-forward" href="checkout.html">Checkout</a>
                            </p>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navbar-wishlist nav navbar-nav pull-right flip">
            <li class="nav-item">
                <a href="wishlist.html" class="nav-link"><i class="ec ec-favorites"></i></a>
            </li>
        </ul>
        <ul class="navbar-compare nav navbar-nav pull-right flip">
            <li class="nav-item">
                <a href="compare.html" class="nav-link"><i class="ec ec-compare"></i></a>
            </li>
        </ul>
    </div>
</nav>
