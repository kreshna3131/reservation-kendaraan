@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('blockhead')
    <link rel="stylesheet" href="{{ asset('assets/css/widget.css') }}" />
    
@endsection
@section('content')
    <header class="page-header page-header-left-inline-breadcrumb">
        <h2 class="kpaw_weight-bold">Dashboard</h2>
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li><a href="{{ url('/') }}">Dashboard</a></li>
            </ol>
        </div>
    </header>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="kpaw_widget kpaw_widget--secondary">
                <span>Data 1</span>
                <span class="kpaw_widget--count kpaw_weight--bold">0</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="kpaw_widget kpaw_widget--success">
                <span>Data 2</span>
                <span class="kpaw_widget--count kpaw_weight--bold">0</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="kpaw_widget kpaw_widget--warning">
                <span>Data 3</span>
                <span class="kpaw_widget--count kpaw_weight--bold">0</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="kpaw_widget kpaw_widget--danger">
                <span>Data 4</span>
                <span class="kpaw_widget--count kpaw_weight--bold">0</span>
            </div>
        </div>
    </div>

    <div class="row pt-3">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7">
                            <h5 class="kpaw_weight--bold mx-0 mt-0 mb-1">Grafik</h5>
                            <p class="mb-3">Hover pada bullet untuk melihat jumlah data.</p>
                        </div>
                        <div class="col-lg-5">
                            <div class="input-daterange input-group kpaw_input--daterange mb-3">
                                <span class="input-group-prepend">
                                    <img src="{{ asset('assets/svg/icons/Icon-Calendar.svg') }}" alt="Calendar">
                                </span>
                                <input type="text" class="form-control kpaw_form--control" name="start" autocomplete="off">
                                <input type="text" class="form-control kpaw_form--control" name="end" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div id="attendanceChart" class="kpaw_chart--wrap"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('porto/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('porto/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/daterange-filter.js') }}"></script>
    <script>
        $(".kpaw_dashboard").addClass("nav-active");
    </script>
@endpush
