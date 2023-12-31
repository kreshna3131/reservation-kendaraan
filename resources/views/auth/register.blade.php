@extends('auth.layouts.app')
@section('title')
Register
@endsection
@section('content')


<h3 class="kpaw_weight--extra-bold pt-0 mt-0">Register</h3>
<p class="mb-3 pb-2">Masukkan alamat email dan password.</p>

@if ($errors->any())
<div class="alert alert-danger" role="alert">
    @if ($errors->count() == 1)
    {{ $errors->first() }}
    @else
    <ul class="error-list m-0 p-0">
        @foreach ($errors->all() as $key => $error)
        {{ $key + 1 }}. {{ $error }} <br>
        @endforeach
    </ul>
    @endif
</div>
@endif




<form action="{{ route('register') }}" method="post">
    @csrf
    <div class="form-group pt-0 mb-4">
        <label>Email</label>
        {{-- <input class="form-control kpaw_form--control @error('email') is-invalid @enderror" type="text" name="email" --}}
        <input class="form-control kpaw_form--control" type="text" name="email"
            autocomplete="on" autofocus value="{{ old('email') }}" />
        @error('email')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group pt-0 mb-2">
        <div class="row no-gutters">
            <div class="col-6">
                <label>Password</label>
            </div>
        </div>
        {{-- <input class="form-control kpaw_form--control @error('password') is-invalid @enderror" type="password" --}}
        <input class="form-control kpaw_form--control" type="password"
            name="password" autocomplete="on" />
        @error('password')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="form-group pt-0 mb-2">
        <div class="row no-gutters">
            <div class="col-6">
                <label>Konfirmasi Password</label>
            </div>
        </div>
        {{-- <input class="form-control kpaw_form--control @error('password') is-invalid @enderror" type="password" --}}
        <input class="form-control kpaw_form--control" type="password"
            name="password confirmation" autocomplete="on" />
        {{-- jika konfirmasi password tidak sama dengan password maka munculkan pesan error --}}
        @error('password')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="custom-control custom-checkbox kpaw_custom--checkbox">
    </div>

    <button anim="ripple" type="submit" class="btn kpaw_btn kpaw_btn--primary kpaw_weight--bold w-100">
        Register
    </button>
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
