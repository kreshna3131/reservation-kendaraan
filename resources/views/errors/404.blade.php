@extends('errors::layout')
@section('title', $error_not_found->title)
@section('message')
    <img src="{{ asset('assets/svg/error/404.svg') }}" alt="Error">
    <h1>{{ $error_not_found->title }}</h1>
    <p>{{ $error_not_found->desc }}</p>
    <a anim="ripple" href="{{ url('/') }}" class="kpaw_btn kpaw_btn--primary kpaw_weight--bold">Go to homepage</a>
@endsection