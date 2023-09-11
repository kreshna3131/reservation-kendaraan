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
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('Favicon.png') }}" type="image/x-icon" />
        <link rel="stylesheet" href="{{ asset('porto/vendor/bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}" />
    </head>
    <body>

        <div class="kpaw_error--bg-right">
            <div class="kpaw_error--bg-left">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="kpaw_error--wrap">
                                <div class="kpaw_error--contents">
                                    @yield('message')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('porto/vendor/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
    </body>
</html>