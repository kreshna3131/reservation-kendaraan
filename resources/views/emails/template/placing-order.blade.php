@component('mail::layout')

@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('assets/images/logo/Logo-Email.png') }}" alt="Absensi">
@endcomponent
@endslot

# Hallo, {{ $pamUser->name }}

Terima kasih sudah bergabung di Airren.
Berikut kami informasikan detail akun beserta pembayarannya.

<div class="kpaw_email--summary-wrap">
<div class="kpaw_summary--block">
    <div class="kpaw_text--dark kpaw_weight--bold">Profil dan Pengelola PAMS</div>
    <div class="kpaw_text--warning">{{ $pamUser->pam->name }}</div>
    <div>{{ $pamUser->pam->full_address }}</div>
</div>

<div class="kpaw_summary--block">
    <div class="kpaw_text--warning">{{ $pamUser->name }}</div>
    <div>Telpon & WA : +{{ $pamUser->prefixed_phone_number }}</div>
</div>

<div class="kpaw_summary--block">
    <div class="kpaw_text--dark kpaw_weight--bold">Informasi Berlangganan</div>
    <div>
        <span class="kpaw_text--warning">Invoice ke 1 ({{ $pamUser->pam->transactions->first()->transaction_id }})</span>&nbsp;
        <span class="kpaw_weight--bold kpaw_text--danger">Unpaid</span>
    </div>
    {{-- <div>Untuk tanggal 01 November 2022 - 30 November 2022 (30 Hari)</div> --}}
</div>

<div class="kpaw_summary--block">
    <div class="kpaw_text--dark kpaw_weight--bold">Rincian Biaya</div>
    <table class="kpaw_table--simple">
        <tr>
            <td>Harga awal</td>
            <td> : </td>
            <td>{{ $setting->rupiah_trial_price }}</td>
        </tr>
    </table>
    <div>Yang harus anda bayar sebesar</div>
    <div class="kpaw_highlight kpaw_text--primary">{{ $setting->rupiah_trial_price }}</div>
</div>

<div class="kpaw_summary--block">
    <div class="kpaw_text--dark kpaw_weight--bold">Informasi Pembayaran</div>
    <div>Silakan transfer sejumlah nominal di atas pada salah satu nomor rekening di bawah ini.</div>
</div>

<table class="kpaw_dual--column mb-3" style="border: none; border-collapse: collapse; cellspacing: 0; cellpadding: 0">
    <tr>
        @foreach (config('company.account') as $account)
            <td>
                <img class="mb-1" src="{{ asset($account['image']) }}" alt="Bank" style="width: auto; min-height: 45px;">
                <div class="kpaw_text--dark kpaw_weight--bold">{{ $account['number'] }}</div>
                <div class="kpaw_fs--default">{{ $account['on_behalf_of'] }}</div>
            </td>
        @endforeach
    </tr>
</table>

<div class="kpaw_fs--default mb-0">Setelah transfer, silakan melakukan konfirmasi pembayaran
melalui whatsapp untuk pembayaran pertama.</div>
</div>

@component('mail::button', ['color' => 'success', 'url' => 'https://api.whatsapp.com/send?phone=62'.$setting->phone_number.'&text=Kami%20telah%20melakukan%20pendaftaran%20aplikasi%20Airren%20sekaligus%20melakukan%20pembayaran%20via%20bank%20dengan%20keterangan%20sbb%20:%0ANomor%20Order%20:%20'.$pamUser->pam->transactions->first()->transaction_id.'%0ADari%20Bank%20:%0AKe%20Bank%20:%0AJumlah%20:%0ATanggal%20:%0AMohon%20diperiksa%20dan%20diaktifkan%20akun%20kami%20Terimakasih'])
Konfimasi
@endcomponent

Mohon segera melakukan konfirmasi pembayaran agar tagihan dapat
segera kami proses. Bila ada pertanyaan terkait dengan tagihan ini,
langsung hubungi kami (62 {{ $setting->phone_number }}) 🤗😊

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
