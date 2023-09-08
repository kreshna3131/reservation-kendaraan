<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="modern fixed has-top-menu has-left-sidebar-half">
    <head>
        <meta charset="UTF-8">
        <title>{{ config('app.name', 'App') }} - @yield('title')</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="google-site-verification" content="" />
        <meta name="msvalidate.01" content="" />
        <meta name="robots" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="shortcut icon" href="{{ asset('Favicon.png') }}" type="image/x-icon" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{ asset('porto/vendor/bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('porto/vendor/animate/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('porto/vendor/pnotify/pnotify.custom.css') }}" />
        <link rel="stylesheet" href="{{ asset('porto/vendor/magnific-popup/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('porto/vendor/select2/css/select2.css') }}" />
        <link rel="stylesheet" href="{{ asset('porto/vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('porto/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />
        <link rel="stylesheet" href="{{ asset('porto/css/theme.css') }}" />
        <link rel="stylesheet" href="{{ asset('porto/css/layouts/modern.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
        @yield('blockhead')
        @stack('style')
        <script src="{{ asset('porto/vendor/modernizr/modernizr.js') }}"></script>
    </head>
    <body>

        <section class="body">
            @include('layouts.header')
            <div class="inner-wrapper">
                @include('layouts.sidebar-left')
                <section role="main" class="content-body">
                    @yield('content')
                </section>
            </div>
        </section>

        <script src="{{ asset('porto/vendor/jquery/jquery.js') }}"></script>
        <script src="{{ asset('porto/vendor/popper/umd/popper.min.js') }}"></script>
        <script src="{{ asset('porto/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('porto/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
        <script src="{{ asset('porto/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('porto/vendor/common/common.js') }}"></script>
        <script src="{{ asset('porto/vendor/nprogress/nprogress.js') }}"></script>
        <script src="{{ asset('porto/vendor/nanoscroller/nanoscroller.js') }}"></script>
        <script src="{{ asset('porto/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('porto/vendor/pnotify/pnotify.custom.js') }}"></script>
        <script src="{{ asset('porto/vendor/select2/js/select2.js') }}"></script>
        <script src="{{ asset('porto/js/sidebar.js') }}"></script>
        <script src="{{ asset('porto/js/theme.js') }}"></script>
        <script src="{{ asset('porto/js/theme.init.js') }}"></script>
        <script src="{{ asset('porto/js/theme.admin.extension.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        @yield('blockfoot')
        @stack('script')

        <script>
			NProgress.start();
			window.onload = function () {
                NProgress.done();
            }
		</script>
    </body>
</html>