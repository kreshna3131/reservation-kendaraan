@extends('errors::layout')
@section('title', $error_page_expired->title)
@section('message')
    <img src="{{ asset('assets/svg/error/403.svg') }}" alt="Error">
    <h1>{{ $error_page_expired->title }}</h1>
    <p>{{ $error_page_expired->desc }}</p>
    <a anim="ripple" href="{{ url('/') }}" class="kpaw_btn kpaw_btn--primary kpaw_weight--bold">Go to homepage</a>
@endsection