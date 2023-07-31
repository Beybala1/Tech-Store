<div class="primary-nav animate-dropdown">
    <div class="clearfix">
        <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse"
                data-target="#default-header">
            &#9776;
        </button>
    </div>

    <div class="collapse navbar-toggleable-xs" id="default-header">
        <nav>
            <ul id="menu-main-menu" class="nav nav-inline yamm">
                <li class="menu-item"><a title="Home" href="{{route("home.index")}}">@lang("messages.home")</a></li>
                <li class="menu-item"><a title="Features" href="{{route("news.index")}}">@lang("messages.news")</a></li>
                <li class="menu-item"><a title="Contact Us" href="{{route("contact-us.index")}}">@lang("messages.contactUs")</a></li>
                <li class="menu-item"><a title="FAQ" href="{{route("frontend.faq.index")}}">@lang("messages.faq")</a></li>
            </ul>
        </nav>
    </div>
</div>
