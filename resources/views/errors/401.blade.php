@extends('errors::layout')
@section('title', $error_unauthorized->title)
@section('message')
    <img src="{{ asset('assets/svg/error/401.svg') }}" alt="Error">
    <h1>{{ $error_unauthorized->title }}</h1>
    <p>{{ $error_unauthorized->desc }}</p>
    <a anim="ripple" href="{{ url('/') }}" class="kpaw_btn kpaw_btn--primary kpaw_weight--bold">Go to homepage</a>
@endsection