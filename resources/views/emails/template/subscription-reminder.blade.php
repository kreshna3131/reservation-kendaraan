@component('mail::layout')

@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('assets/images/logo/Logo-Email.png') }}" alt="Absensi">
@endcomponent
@endslot

# Hallo, {{ $pam->name }}

@if ($pam->is_active)
Masa aktif anda akan segera berakhir dalam {{ config('company.notification.reminder') }} hari lagi.
@endif
@if ($pam->is_billed)
{{ config('company.notification.reminder') }} hari sebelum Anda kami blokir. Segera lakukan pembayaran ya.
@endif

<div class="kpaw_email--summary-wrap">
<div class="kpaw_summary--block">
    <div class="kpaw_text--dark kpaw_weight--bold">Informasi Berlangganan</div>
    <div class="kpaw_text--warning">Bulan ke {{ $pam->validTransactions->count() }}</div>
    <div>{{ formatDate($pam->date_start, 'd F Y') }} - {{ formatDate($pam->date_end, 'd F Y') }} (30 Hari)</div>
</div>
</div>

Bila ada pertanyaan terkait dengan hal ini, langsung hubungi kami
(62 {{ $setting->phone_number }}) 🤗😊

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
