<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" itemscope="itemscope">
@include("frontend.include.links")
<body class="@yield("body")">
<div id="page" class="hfeed site">
    @include("frontend.include.header")
        @yield("content")
    @include("frontend.include.footer")
</div>
@include("frontend.include.scripts")
</body>
</html>

