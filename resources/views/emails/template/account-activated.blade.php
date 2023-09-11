@component('mail::layout')

@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('assets/images/logo/Logo-Email.png') }}" alt="Absensi">
@endcomponent
@endslot

# Hallo, {{ $user->name }}

Akun anda berhasil kami aktifkan kembali.

Semoga dengan aplikasi ini dapat mengatasi masalah ketersediaan
air bersih di desa Anda. Kami ucapkan sekali lagi terima kasih.

Bila ada pertanyaan terkait dengan hal ini, langsung hubungi kami
(62 {{ $setting->phone_number }}) 🤗😊

Salam Kami,<br>
<span class="kpaw_signature">AbCMS sensi</span>

@slot('footer')
@component('mail::footer')
&copy; Copyright {{ date('Y') }} CMS Absensi. All Rights Reserved.
<br>
by KreshnaPutra.
@endcomponent
@endslot

@endcomponent
