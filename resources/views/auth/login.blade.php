@extends('auth.layouts.app')
@section('title')
Sign in
@endsection
@section('content')
<h3 class="kpaw_weight--extra-bold pt-0 mt-0">Sign in</h3>
<p class="mb-3 pb-2">Masukkan alamat email dan password.</p>

{{-- @if (session()->has('error'))
<div class="kpaw_alert kpaw_alert--danger">
    {{ session('error') }}
</div>
@endif

@if (isset($_COOKIE['login-status']))
<div class="kpaw_alert kpaw_alert--danger" id="throttle-alert" data-throttle-end="{{ $_COOKIE['throttle-end'] }}">
    Anda sudah melakukan 5 kali percobaan gagal. Silahkan tunggu setelah <span id="minutes">00</span> menit <span
        id="seconds">00</span> detik.
    Jika Anda mencoba login pada waktu tersebut dan gagal, maka IP Anda akan di Banned.
</div>
@endif --}}

<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="form-group pt-0 mb-4">
        <label>Email</label>
        <input class="form-control kpaw_form--control @error('email') is-invalid @enderror" type="text" name="email"
            autocomplete="on" autofocus value="{{ old('email') }}" />
        @error('email')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group pt-0 mb-4">
        <div class="row no-gutters">
            <div class="col-6">
                <label>Password</label>
            </div>
        </div>
        <input class="form-control kpaw_form--control @error('password') is-invalid @enderror" type="password"
            name="password" autocomplete="on" />
        @error('password')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
        @enderror
    </div>

        <button anim="ripple" type="submit" class="btn kpaw_btn kpaw_btn--primary kpaw_weight--bold w-100">
            Sign in
        </button>

        <div class="custom-control custom-checkbox kpaw_custom--checkbox mt-3 mb-2">
            <div class="row no-gutters">
                <div class="col-6">
                    <div class="text" style="margin-left: -35px">
                        <a href="{{ route('password.request') }}" class="kpaw_weight--bold kpaw_text--secondary">Forgot
                            Password?</a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <a href="{{ route('register') }}" class="kpaw_weight--bold kpaw_text--secondary">Belum Punya Akun?</a>
                    </div>
                </div>
            </div>
        </div>
</form>
@endsection
@push('script')
<script src="https://moment.github.io/luxon/global/luxon.min.js"></script>
<script>
    if ($("#throttle-alert").length) {
            const DateTime = luxon.DateTime;
            const throttle_end = $("#throttle-alert").data('throttle-end');
            let countDownDate = DateTime.fromSQL(throttle_end).toMillis();

            setInterval(() => {
                let now = DateTime.now().toMillis();
                let distance = countDownDate - now;

                let minutes = Math.floor((distance % (400 * 60 * 60)) / (400 * 60));
                let seconds = Math.floor((distance % (400 * 60)) / 400);

                minutes < 10 ? $("#minutes").html(`0${minutes}`) : $("#minutes").html(minutes);
                seconds < 10 ? $("#seconds").html(`0${seconds}`) : $("#seconds").html(seconds);

                if (distance < 0) {
                    $("#throttle-alert").remove();
                }
            }, 1000);
        }
</script>
@endpush
