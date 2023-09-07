@extends('auth.layouts.app')
@section('title')
    Forgotten password?
@endsection
@section('content')
    <h3 class="kpaw_weight--extra-bold pt-0 mt-0">Forgotten password?</h3>
    <p class="mb-3 pb-2">Masukkan alamat email untuk mereset password.</p>

    @if(session()->has('status'))
        <div class="kpaw_alert kpaw_alert--success">
            {{ session('status') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="kpaw_alert kpaw_alert--danger">
            {{ session('error') }}
        </div>
    @endif

    @if (isset($_COOKIE['reset-password-throttle-end']))
        <div class="kpaw_alert kpaw_alert--danger" id="throttle-alert" data-throttle-end="{{ $_COOKIE['reset-password-throttle-end'] }}">
            Harap tunggu <span id="seconds">00</span> detik, sebelum mengirim email lagi.
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="form-group pt-0 mb-4">
            <label>Email</label>
            <input
                class="form-control kpaw_form--control @error('email') is-invalid @enderror"
                type="email"
                placeholder=""
                name="email"
                autocomplete="on"
                value="{{ old('email') }}"
                autofocus
            />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="row no-gutters pt-2">
            <div class="col-6">
                <a anim="ripple" href="{{ url('/') }}" class="btn kpaw_btn kpaw_btn--light-primary kpaw_weight--bold">
                    Cancel
                </a>
            </div>
            <div class="col-6">
                <div class="text-right">
                    <button anim="ripple" type="submit" class="btn kpaw_btn kpaw_btn--primary kpaw_weight--bold">
                        Submit
                    </button>
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

                let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                seconds < 10 ? $("#seconds").html(`0${seconds}`) : $("#seconds").html(seconds);

                if (distance < 0) {
                    $("#throttle-alert").remove();
                }
            }, 1000);
        }
    </script>
@endpush