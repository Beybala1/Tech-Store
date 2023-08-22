    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('backend/assets/')}}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    @yield('title')
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <link rel="icon" type="image/x-icon"
        href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">
    @include('backend.links.datatable')
    {{-- İcons --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/flag-icons.css')}}" />
    {{-- Style --}}
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('backend/assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="{{ asset('backend/assets/vendor/js/helpers.js')}}"></script>
    <script src="{{ asset('backend/assets/js/config.js')}}"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('sweetalert::alert')
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo ">
                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <path
                                        d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                                        id="path-1"></path>
                                    <path
                                        d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                                        id="path-3"></path>
                                    <path
                                        d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                                        id="path-4"></path>
                                    <path
                                        d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                                        id="path-5"></path>
                                </defs>
                                <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                        <g id="Icon" transform="translate(27.000000, 15.000000)">
                                            <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                <mask id="mask-2" fill="white">
                                                    <use xlink:href="#path-1"></use>
                                                </mask>
                                                <use fill="#696cff" xlink:href="#path-1"></use>
                                                <g id="Path-3" mask="url(#mask-2)">
                                                    <use fill="#696cff" xlink:href="#path-3"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                                </g>
                                                <g id="Path-4" mask="url(#mask-2)">
                                                    <use fill="#696cff" xlink:href="#path-4"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                                </g>
                                            </g>
                                            <g id="Triangle"
                                                transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                <use fill="#696cff" xlink:href="#path-5"></use>
                                                <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <li class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : ''}}">
                        <a href="{{ route('dashboard.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                            <div data-i18n="@lang('messages.dashboard')">@lang('messages.dashboard')</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs(['slider.index','slider.create','slider.edit']) ? 'active' : ''}}">
                        <a href="{{ route('slider.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-sliders-h"></i>
                            <div data-i18n="@lang('messages.slider')">@lang('messages.slider')</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs(['brand.index','brand.create','brand.edit']) ? 'active' : ''}}">
                        <a href="{{ route('brand.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-list"></i>
                            <div data-i18n="@lang('messages.brand')">@lang('messages.brand')</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs(['category.index','category.create','category.edit']) ? 'active' : ''}}">
                        <a href="{{ route('category.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-list"></i>
                            <div data-i18n="@lang('messages.category')">@lang('messages.category')</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs(['alt-category.index','alt-category.create','alt-category.edit']) ? 'active' : ''}}">
                        <a href="{{ route('alt-category.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-list"></i>
                            <div data-i18n="@lang('messages.alt-category')">@lang('messages.alt-category')</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs(['products.index','products.create','products.edit']) ? 'active' : ''}}">
                        <a href="{{ route('products.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-shopping-cart"></i>
                            <div data-i18n="@lang('messages.products')">@lang('messages.products')</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs(['service.index','service.create','service.edit']) ? 'active' : ''}}">
                        <a href="{{ route('service.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-wrench"></i>
                            <div data-i18n="@lang('messages.service')">@lang('messages.service')</div>
                        </a>
                    </li>
                     <li class="menu-item {{ request()->routeIs(['statistic.index','statistic.create','statistic.edit']) ? 'active' : ''}}">
                        <a href="{{ route('statistic.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-chart-bar"></i>
                            <div data-i18n="@lang('messages.statistic')">@lang('messages.statistic')</div>
                        </a>
                    </li>
                     <li class="menu-item {{ request()->routeIs(['partner.index','partner.create','partner.edit']) ? 'active' : ''}}">
                        <a href="{{ route('partner.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-users"></i>
                            <div data-i18n="@lang('messages.partner')">@lang('messages.partner')</div>
                        </a>
                    </li>
                     <li class="menu-item {{ request()->routeIs(['blog.index','blog.create','blog.edit']) ? 'active' : ''}}">
                        <a href="{{ route('blog.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-newspaper"></i>
                            <div data-i18n="@lang('messages.blog')">@lang('messages.blog')</div>
                        </a>
                    </li>
                     <li class="menu-item {{ request()->routeIs(['faq.index','faq.create','faq.edit']) ? 'active' : ''}}">
                        <a href="{{ route('faq.index') }}" class="menu-link">
                            <i class="menu-icon fa-solid fa-circle-question"></i>
                            <div data-i18n="@lang('messages.faq')">@lang('messages.faq')</div>
                        </a>
                    </li>
                    <li class="menu-item" style="">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon fas fa-building"></i>
                            <div data-i18n="Dashboards">@lang('messages.company-info')</div>
                        </a>
                        <ul class="menu-sub">
                             <li class="menu-item {{ request()->routeIs(['about.index','about.edit']) ? 'active' : ''}}">
                        <a href="{{ route('about.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-building"></i>
                            <div data-i18n="@lang('messages.about')">@lang('messages.about')</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs(['contact-info.index','contact-info.create','contact-info.edit']) ? 'active' : ''}}">
                        <a href="{{ route('contact-info.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-building"></i>
                            <div data-i18n="@lang('messages.contact-info')">@lang('messages.contact-info')</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs(['social.index','social.create','social.edit']) ? 'active' : ''}}">
                        <a href="{{ route('social.index') }}" class="menu-link">
                            <i class="menu-icon fab fa-instagram-square"></i>
                            <div data-i18n="@lang('messages.social')">@lang('messages.social')</div>
                        </a>
                    </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->routeIs(['message.index']) ? 'active' : ''}}">
                        <a href="{{ route('message.index') }}" class="menu-link">
                            <i class="menu-icon fas fa-envelope"></i>
                            <div data-i18n="@lang('messages.message')">@lang('messages.message')</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ asset(config('translation.ui_url')) }}" target="_blank" class="menu-link">
                            <i class=" menu-icon fa-solid fa-language"></i>
                            <div data-i18n="@lang('messages.translation')">@lang('messages.translation')</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs(['language.index','language.create','language.edit']) ? 'active' : ''}}">
                        <a href="{{ route('language.index') }}" class="menu-link">
                            <i class="menu-icon fa-solid fa-globe"></i>
                            <div data-i18n="@lang('messages.language')">@lang('messages.language')</div>
                        </a>
                    </li>
                    @role('admin')
                        <li class="menu-item {{ request()->routeIs(['user-and-roles.index','user-and-roles.create','user-and-roles.show','user-and-roles.store']) ? 'menu active' : ''}}">
                            <a href="{{ route('user-and-roles.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user"></i>
                                <div data-i18n="@lang('messages.users_and_roles')">@lang('messages.users_and_roles')</div>
                            </a>
                        </li>
                    @endrole
                </ul>
            </aside>
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Language -->
                            <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <i class='fi fi-{{ app()->getLocale() }} fis rounded-circle fs-3 me-1'></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        @foreach (lang() as $language)
                                            <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($language->code) }}"
                                                data-language="{{ $language->code }}">
                                                <i class="fi fi-{{ $language->code }} fis rounded-circle fs-4 me-1"></i>
                                                <span class="align-middle">{{ $language->name }}</span>
                                            </a>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                            <!--/ Language -->
                            <!-- Style Switcher -->
                            <li class="nav-item me-2 me-xl-0">
                                <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                                    <i class='bx bx-sm'></i>
                                </a>
                            </li>
                            <!--/ Style Switcher -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset(auth()->user()->image )}}" alt
                                            class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset(auth()->user()->image )}}" alt
                                                            class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ auth()->user()->email }}</span>
                                                    <small class="text-muted">@lang('messages.admin')</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">@lang('messages.myProfile')</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">@lang('messages.logout')</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper  d-none">
                        <input type="text" class="form-control search-input container-xxl border-0"
                            placeholder="Search..." aria-label="Search...">
                        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                    </div>
                </nav>
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                {{ config('app.name') }}
                                {{ now()->year }}
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>
    <script>
        $(document).ready(function () {
            var table = $('#table').DataTable({
                responsive: true,
                dom: 'Bfrltip',
                lengthChange: true,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container()
            .appendTo('#table_wrapper .col-md-6:eq(0)');

            $(document).on('click', '.del', function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                Swal.fire({
                  title: '@lang('messages.confirmation_title')',
                  text: '@lang('messages.confirmation_text')',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: '@lang('messages.delete')',
                  cancelButtonText: '@lang('messages.cancel')'
                }).then((result) => {
                  if (result.isConfirmed) {
                    form.submit();
                  }
                });
            });
        });

    </script>
    @stack('scripts')
    <script src="{{ asset('backend/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/js/menu.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{ asset('backend/assets/js/main.js')}}"></script>
</body>
</html>

