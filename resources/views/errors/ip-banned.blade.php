@extends('errors.new-layout')
@section('title', __('IP banned'))
@section('message')
    <h1 class="fw-bolder fs-4x text-gray-700 mb-10">Your IP has been banned!</h1>
    <div class="fw-bold fs-3 text-gray-400 mb-5">
        Your IP address has been flagged and is currently banned from viewing this site.
    </div>
    <div class="fw-bold fs-3 text-gray-400 mb-10">
        Your IP address : <span class="text-danger fw-bolder">{{ request()->getClientIp() }}</span>
    </div>
@endsection
