@extends('errors::layout')
@section('title', $error_too_many_request->title)
@section('message')
    <img src="{{ asset('assets/svg/error/429.svg') }}" alt="Error">
    <h1>{{ $error_too_many_request->title }}</h1>
    <p>{{ $error_too_many_request->desc }}</p>
    <a anim="ripple" href="{{ url('/') }}" class="kpaw_btn kpaw_btn--primary kpaw_weight--bold">Go to homepage</a>
@endsection