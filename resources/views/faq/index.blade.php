@extends('layouts.app')
@section('title')
FAQ
@endsection
@section('blockhead')
<link rel="stylesheet" href="{{ asset('porto/vendor/summernote/summernote.min.css') }}">
<link rel="stylesheet" href="{{ asset('porto/vendor/summernote/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('porto/vendor/cropper/cropper.min.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('porto/vendor/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('porto/vendor/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('assets/js/faq/summernote.js') }}"></script>
@endsection
@section('content')
<header class="page-header page-header-left-inline-breadcrumb">
    <h2 class="kpaw_weight-bold">FAQ</h2>
    <div class="right-wrapper">
        <ol class="breadcrumbs">
            <li><a href="{{ route('faq.index') }}">FAQ</a></li>
            <li><span>Tentang Kami</span></li>
        </ol>
    </div>
</header>
<!-- card content -->
<section class="kpaw_form--container">
    {{-- <form action="{{ route('faq.store') }}" method="POST" class="kpaw_main_form" enctype="multipart/form-data">
        --}}
        <form action="#" method="POST" class="kpaw_main_form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="mb-4">
                        <div class="mb-4">
                            <input type="text" class="form-control kpaw_form--control bg-white m-0" id="title"
                                name="title" />
                            <input type="hidden" name="user_id">
                            <input type="hidden" name="preview" value="1" id="preview">
                        </div>
                        <div>
                            <textarea class="summernote d-none" name="content" id="content"></textarea>
                        </div>
                    </div>
                </div>
        </form>
</section>
<div>
    <header class="page-header page-header-left-inline-breadcrumb">
        {{-- <h2 class="kpaw_weight-bold">FAQ</h2> --}}
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                <li class="disabled"><span>Persyaratan</span></li>
            </ol>
        </div>
    </header>
</div>
<section class="kpaw_form--container">
    {{-- <form action="{{ route('faq.store') }}" method="POST" class="kpaw_main_form" enctype="multipart/form-data">
        --}}
        <form action="#" method="POST" class="kpaw_main_form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="mb-4">
                        <div class="mb-4">
                            <input type="text" class="form-control kpaw_form--control bg-white m-0" id="title"
                                name="title" />
                            <input type="hidden" name="user_id">
                            <input type="hidden" name="preview" value="1" id="preview">
                        </div>
                        <div>
                            <textarea class="summernote d-none" name="content" id="content"></textarea>
                        </div>
                    </div>
                </div>
        </form>
</section>

{{-- @include('include.modal-delete') --}}
@endsection
@section('blockfoot')
<script src="{{ asset('porto/vendor/cropper/cropper.min.js') }}"></script>
<script src="{{ asset('porto/vendor/compressor/compressor.min.js') }}"></script>
<script src="{{ asset('porto/vendor/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('porto/vendor/summernote/summernote-bs4.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/faq/summernote.js') }}"></script> --}}
<script src="{{ asset('assets/js/faq/ajax.js') }}"></script>
<script src="{{ asset('assets/js/default-ajax.js') }}"></script>
<script src="{{ asset('assets/js/faq/additional.js') }}"></script>
<script src="{{ asset('assets/js/faq/create-ajax.js') }}"></script>
{{-- <script src="{{ asset('porto/vendor/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('porto/vendor/summernote/summernote-bs4.min.js') }}"></script> --}}


<script>
    $('.kpaw_content').addClass('nav-expanded nav-active');
        $('.kpaw_content_faq').addClass('nav-expanded nav-active');
        $('.kpaw_content_faq_create').addClass('nav-active');
</script>
@endsection
