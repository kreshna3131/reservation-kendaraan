@component('mail::layout')

@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('assets/images/logo/Logo-Email.png') }}" alt="Absensi">
@endcomponent
@endslot

# Hallo, {{ $user->name }}

Untuk sementara waktu, akun anda kami nonaktifkan dikarenakan
suatu hal semisal melanggar kebijakan privasi atau term of service
dari kami.

Anda dapat bertanya secara detail kepada kami kenapa akun ini
dinonaktifkan. Segera hubungi kami dinomor 62 {{ $setting->phone_number }} 🙏🙏

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
