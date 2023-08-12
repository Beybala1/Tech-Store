@extends("layouts.frontend")
@section("content")
    @section("title")
        <title>@lang("messages.myAccount")</title>
    @endsection
    @section("body")
        page home page-template-default
    @endsection
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <nav class="woocommerce-breadcrumb" >
                <a href="{{route("home.index")}}">@lang("messages.home")</a>
                <span class="delimiter"><i class="fa fa-angle-right"></i></span>@lang("messages.myAccount")
            </nav><!-- .woocommerce-breadcrumb -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article id="post-8" class="hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="customer-login-form">
                                    <span class="or-text">@lang("messages.or")</span>
                                    <div class="col2-set" id="customer_login">
                                        <div class="col-1">
                                            <h2>@lang("messages.login")</h2>
                                            <form action="{{route("login")}}" method="post" class="login">
                                                @csrf
                                                <p class="before-login-text">@lang("messages.loginYourAccount")</p>
                                                <p class="form-row form-row-wide">
                                                    <label for="email">@lang("messages.email")<span class="required">*</span></label>
                                                    <input type="email" name="email" value="{{old("email")}}" class="input-text" id="email" required/>
                                                </p>

                                                <p class="form-row form-row-wide">
                                                    <label for="password">@lang("messages.password")<span class="required">*</span></label>
                                                    <input type="password" name="password" class="input-text" id="password" required/>
                                                </p>
                                                <p class="form-row">
                                                    <input class="button" type="submit" value="@lang("messages.login")" name="login">
                                                    <label for="rememberme" class="inline">
                                                            <input type="checkbox" name="remember" id="rememberme"  /> @lang("messages.rememberMe")
                                                    </label>
                                                </p>
                                                <p class="lost_password">
                                                    <a href="login-and-register.html">@lang("messages.forgetYourPassword")</a>
                                                </p>
                                            </form>
                                        </div>
                                        <div class="col-2">
                                            <h2>@lang("messages.register")</h2>
                                            <form action="{{route("register")}}" method="post" class="register">
                                                @csrf
                                                <p class="before-register-text">@lang("messages.createAccount")</p>
                                                <p class="form-row form-row-wide">
                                                    <label for="name">@lang("messages.name")<span class="required">*</span></label>
                                                    <input type="text" name="name" value="{{old("name")}}" class="input-text" id="name" />
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <label for="reg_email">@lang("messages.email")<span class="required">*</span></label>
                                                    <input type="email" name="email" value="{{old("email")}}" class="input-text" id="reg_email" />
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <label for="password">@lang("messages.password")<span class="required">*</span></label>
                                                    <input type="password" name="password" class="input-text" id="password" />
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <label for="reg_email">@lang("messages.confirmPassword")<span class="required">*</span></label>
                                                    <input type="password" name="password_confirmation" class="input-text" id="reg_password" />
                                                </p>
                                                <p class="form-row">
                                                    <input type="submit" class="button" name="register" value="@lang("messages.register")" />
                                                </p>
                                            </form>
                                        </div><!-- .col-2 -->
                                    </div><!-- .col2-set -->
                                </div><!-- /.customer-login-form -->
                            </div><!-- .woocommerce -->
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .col-full -->
    </div><!-- #content -->


@endsection
