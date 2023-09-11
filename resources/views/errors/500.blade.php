@extends('errors::layout')
@section('title', $error_internal_service->title)
@section('message')
    <img src="{{ asset('assets/svg/error/500.svg') }}" alt="Error">
    <h1>{{ $error_internal_service->title }}</h1>
    <p>{{ $error_internal_service->desc }}</p>
    <a anim="ripple" href="{{ url('/') }}" class="kpaw_btn kpaw_btn--primary kpaw_weight--bold">Go to homepage</a>
@endsection