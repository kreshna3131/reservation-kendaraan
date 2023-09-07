<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

        <link rel="stylesheet" href="{{ asset('porto/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('porto/vendor/font-awesome/css/all.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('porto/vendor/boxicons/css/boxicons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('porto/css/theme.css') }}" />
        <link rel="stylesheet" href="{{ asset('porto/css/layouts/modern.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
        @stack('style')
    </head>
    <body>

        <div class="kpaw_auth--wrap">
            <div class="kpaw_auth--aside">
                <div class="kpaw_auth--bg-top">
                    <div class="kpaw_auth--bg-bottom">
                        <div class="kpaw_auth--aside-contents text-center">
                            <img class="pb-4 mb-5" src="{{ asset('assets/svg/logo/Logo-Auth.svg') }}" alt="Logo">
                            <p class="mb-0">&copy; Copyright 2023 by</p>
                            <p>The Five Amigos All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kpaw_auth--contents">
                {{-- <div class="kpaw_contact--administrator">
                    Don't have an account yet?
                    <a href="wa.me/6281287560665" class="kpaw_weight--bold kpaw_text--secondary">Contact Administrator!</a>
                </div> --}}
                <div class="kpaw_auth--form-wrap">
                    <div class="kpaw_mobile--contents">
                        <div class="text-center">
                            <img class="mb-4" src="{{ asset('assets/svg/logo/Logo-Auth.svg') }}" alt="Logo">
                            <p class="mb-4">Reservasi Kendaraan Sistem <br> by The Five Amigos</p>
                        </div>
                    </div>

                    @yield('content')

                    {{-- <div class="kpaw_contact--mobile-administrator">
                        Don't have an account yet?
                        <a href="wa.me/6281287560665" class="kpaw_weight--bold">Contact Administrator!</a>
                    </div> --}}
                </div>
            </div>
        </div>

        <script src="{{ asset('porto/vendor/jquery/jquery.js') }}"></script>
        <script src="{{ asset('porto/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
        <script src="{{ asset('porto/vendor/popper/umd/popper.min.js') }}"></script>
        <script src="{{ asset('porto/vendor/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('porto/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('porto/vendor/common/common.js') }}"></script>
        <script src="{{ asset('porto/vendor/nanoscroller/nanoscroller.js') }}"></script>
        <script src="{{ asset('porto/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('porto/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        @stack('script')
    </body>
</html>
