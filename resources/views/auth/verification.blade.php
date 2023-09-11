@extends('auth.layouts.app')
@section('title')
Verification
@endsection
@section('content')
<h3 class="kpaw_weight--extra-bold pt-0 mt-0">Verifikasi Ulang</h3>
<p class="mb-3 pb-2">Masukkan alamat email anda.</p>


@if (session('verifikasi_error'))
<div class="alert alert-danger alert-dismissible verifikasi-alert" role="alert" id="verifikasi">
    {{ session('verifikasi_error') }}
</div>
@endif

<form action="{{ route('verification') }}" method="post">
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

    <button anim="ripple" type="submit" class="btn kpaw_btn kpaw_btn--primary kpaw_weight--bold w-100">
        Verifikasi
    </button>
</form>
@endsection
@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

<script>
    // Menghilangkan notifikasi setelah beberapa detik (misalnya, 5 detik)
    setTimeout(function () {
        $('.verifikasi-alert').fadeOut('slow', function () {
            $(this).remove();
        });
    }, 3000);

</script>
@endpush
