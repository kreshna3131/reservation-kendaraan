@component('mail::layout')

@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('assets/images/logo/Logo-Email.png') }}" alt="Absensi">
@endcomponent
@endslot

# Hallo, Angelina Doe

Anda menerima email ini karena kami menerima permintaan
pengaturan ulang kata sandi untuk akun anda.

@component('mail::button', ['color' => 'primary', 'url' => ''])
Reset Password
@endcomponent

Tautan pengaturan ulang kata sandi ini akan kedaluwarsa kurang dari
{{ config('auth.passwords.members.expire') }} menit.

Jika Anda tidak meminta pengaturan ulang kata sandi, tidak ada
tindakan lebih lanjut yang diperlukan.

Salam Kami,<br>
<span class="kpaw_signature">CMS Absensi</span>

@slot('footer')
@component('mail::footer')
&copy; Copyright {{ date('Y') }} CMS Absensi. All Rights Reserved.
<br>
by KreshnaPutra.
@endcomponent
@endslot

@endcomponent
