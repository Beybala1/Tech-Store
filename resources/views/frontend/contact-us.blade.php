@extends("layouts.frontend")
@section("content")
    @section("body")
        page full-width
    @endsection
    @section("title")
        <title>@lang("messages.contactUs")</title>
    @endsection
    @include('sweetalert::alert')

    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <nav class="woocommerce-breadcrumb" >
                <a href="{{route("home.index")}}">@lang("messages.home")</a>
                <span class="delimiter"><i class="fa fa-angle-right"></i></span>
                @lang("messages.contactUs")
            </nav><!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article class="hentry">
                        <header class="entry-header">
                            <h1 class="entry-title">@lang("messages.contactUs")</h1>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="wpb_wrapper outer-bottom-xs">
                                        <h2 class="contact-page-title">@lang("messages.leaveUsMessage")</h2>
                                        <p>Aenean massa diam, viverra vitae luctus sed, gravida eget est. Etiam nec ipsum porttitor, consequat libero eu, dignissim eros. Nulla auctor lacinia enim id mollis. Curabitur luctus interdum eleifend. Ut tempor lorem a turpis fermentum,.</p>
                                    </div>
                                    <div role="form" class="wpcf7">
                                        <div class="screen-reader-response"></div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{route("contact-us.store")}}" id="myForm" method="post" class="wpcf7-form">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-md-6">
                                                    <label>@lang("messages.name")*</label><br />
                                                    <span class="wpcf7-form-control-wrap name">
                                                          <input type="text" name="name" value="{{old('name')}}" size="40"
                                                                 class="wpcf7-form-control input-text" aria-required="true" aria-invalid="false"  required/>
                                                    </span>
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <label>@lang("messages.email")*</label><br />
                                                    <span class="wpcf7-form-control-wrap email">
                                                        <input type="email" name="email" value="{{old('email')}}" size="40"
                                                               class="wpcf7-form-control input-text" aria-required="true" aria-invalid="false" required/>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-md-12">
                                                    <label>@lang("messages.phone")*</label><br />
                                                    <span class="wpcf7-form-control-wrap phone">
                                                        <input type="phone" name="phone" value="{{old('phone')}}" size="40"
                                                               class="wpcf7-form-control input-text" aria-required="true" aria-invalid="false" required/>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>@lang("messages.subject")</label><br />
                                                <span class="wpcf7-form-control-wrap subject">
                                                    <input type="text" name="subject" value="{{old('subject')}}" size="0"
                                                           class="wpcf7-form-control input-text" aria-invalid="false"/>
                                                </span>
                                            </div>

                                            <div class="form-group">
                                                <label>@lang("messages.yourMessage")</label><br />
                                                <span class="wpcf7-form-control-wrap your-message">
                                                    <textarea name="message" cols="40" rows="10"
                                                              class="wpcf7-form-control input-text wpcf7-textarea" aria-invalid="false">
                                                            {{old('message')}}
                                                    </textarea>
                                                </span>
                                            </div>

                                            <div class="form-group clearfix">
                                                <p>
                                                    <input type="submit" id="myButton" value="@lang("messages.submit")"
                                                           class="wpcf7-form-control wpcf7-submit" />
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- .col -->

                                <div class="store-info store-info-v2 col-sm-6">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="inner-left-xs outer-bottom-xs">

                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481.593303940039!2d-0.15470444843858283!3d51.53901886611164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ae62edd5771%3A0x27f2d823e2be0249!2sPrincess+Rd%2C+London+NW1+8JR%2C+UK!5e0!3m2!1sen!2s!4v1458827996435" width="600" height="288" style="border:0" allowfullscreen></iframe>

                                            </div>

                                            <div class="inner-left-xs">
                                                <div class="wpb_wrapper">
                                                    <h2 class="contact-page-title">@lang("messages.ourAdress")</h2>
                                                    @foreach($contactInfos as $contactInfo)
                                                        <p>
                                                            {{$contactInfo->description}}
                                                        </p>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .col-full -->
    </div><!-- #content -->
@endsection
