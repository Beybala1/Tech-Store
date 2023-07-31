@extends("layouts.frontend")
@section("content")
    @section("body")
        page home page-template-default
    @endsection
    @section("title")
        <title>@lang("messages.faq")</title>
    @endsection
            <div id="content" class="site-content" tabindex="-1">
                <div class="container">
                    <nav class="woocommerce-breadcrumb"><a href="{{route("home.index")}}">@lang("messages.home")</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>@lang("messages.faq")</nav>
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <article class="page type-page status-publish hentry" >
                                <div itemprop="mainContentOfPage" class="entry-content">
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper"><h2 class="vc_custom_heading vc_custom_1458140045264" style="font-size: 40px;color: #434343;text-align: center;font-family:Open Sans;font-weight:400;font-style:normal">@lang("messages.faq")</h2></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="accordion" role="tablist" aria-multiselectable="true">
                                        @foreach($faqs as $key => $faq)
                                            <div class="vc_toggle panel panel-default">
                                                <div class="panel-heading" role="tab" id="heading_{{$key}}">
                                                    <div class="vc_toggle_title">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" style="color: #434343;" data-parent="#accordion"
                                                               href="#collapse_{{$key}}" aria-expanded="true" aria-controls="collapse_{{$key}}">
                                                                {{$faq->title}}
                                                            </a>
                                                        </h4>
                                                        <i class="vc_toggle_icon"></i>
                                                    </div>
                                                </div>
                                                <div id="collapse_{{$key}}" class="vc_toggle_content panel-collapse collapse" role="tabpanel"
                                                     aria-labelledby="heading_{{$key}}">
                                                    <p>
                                                        {{$faq->content}}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div><!-- .entry-content -->
                            </article>
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div><!-- .container -->
            </div><!-- #content -->
    @endsection
