@extends('auth.layouts.app')
@section('title')
    Reset password
@endsection
@section('content')
    <h3 class="kpaw_weight--extra-bold pt-0 mt-0">Reset password</h3>
    <p class="mb-3 pb-2">Silakan membuat password baru dan pastikan kamu selalu mengingatnya.</p>

    @if(session()->has('status'))
        <div class="kpaw_alert kpaw_alert--success">
            {{ session('status') }}
        </div>
    @endif

    @error('weak_password')
        @if ($errors->count() === 1)
            <div class="kpaw_alert kpaw_alert--danger">
                {{ $message }}
            </div>
        @endif
    @enderror

    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input
            type="hidden"
            name="token"
            value="{{ request()->token }}"
        />
        <div class="form-group pt-0 mb-4">
            <label>Email</label>
            <input
                type="text"
                name="email"
                value="{{ request()->query('email') }}"
                class="form-control kpaw_form--control @error('email') is-invalid @enderror"
                readonly
            />
        </div>

        <div class="form-group pt-0 mb-4">
            <div class="d-block">
                <label>Password</label>
                <input
                    class="form-control kpaw_form--control @error('password') is-invalid @enderror"
                    type="password"
                    placeholder=""
                    name="password"
                    autocomplete="off"
                    autofocus
                />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div id="password-strength" class="strength kpaw_password--strength mt-3"><span></span></div>
        </div>

        <div class="form-group pt-0 mb-4">
            <label>Password Confirmation</label>
            <input
                class="form-control kpaw_form--control"
                type="password"
                placeholder=""
                name="password_confirmation"
                autocomplete="off"
            />
        </div>

        <div class="mb-4" id="week-password-checkbox"></div>

        <div class="row no-gutters pt-2">
            <div class="col-6">

                <a anim="ripple" href="{{ route('register') }}" class="btn kpaw_btn kpaw_btn--light-primary kpaw_weight--bold">
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
    <script src="{{ asset('porto/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/auth-password-meter.js') }}"></script>

    <script>
        // Fungsi untuk mengarahkan ke halaman login saat tombol "Cancel" diklik
        function redirectToLogin() {
            window.location.href = "{{ route('login.form') }}";
        }

        // Menambahkan event listener untuk tombol "Cancel"
        document.querySelector('.btn.kpaw_btn--light-primary').addEventListener('click', redirectToLogin);
    </script>
@endpush
