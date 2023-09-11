@component('mail::layout')
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('assets/images/logo/Logo-Email.png') }}" alt="Absensi">
@endcomponent
<style>
    .kpaw_signature {
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
        position: relative;
        color: #7700FF;
        font-weight: 700;
    }
</style>
@endslot

# Hallo, {{ $member->name }}
Silakan Hubungi Admin Terkait untuk mendapatkan Laporan Absensi anda pada periode {{ $start_date }} sampai dengan
{{ $end_date }}.

Salam Kami,<br>
<span class="kpaw_signature">Absensi CMS</span>

@slot('footer')
@component('mail::footer')
&copy; Copyright {{ date('Y') }} CMS Absensi. All Rights Reserved.
by KreshnaPutra.
@endcomponent
@endslot
@endcomponent