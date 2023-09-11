@component('mail::layout')

@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('assets/images/logo/Logo-Email.png') }}" alt="Absensi">
@endcomponent
@endslot

# Hallo, {{ $pam->name }}

Anda sudah menggunakan aplikasi kami selama 30 hari. Kami sudah
menerbitkan invoice baru untuk Anda. Berikut informasi detailnya.

<div class="kpaw_email--summary-wrap">
<div class="kpaw_summary--block">
    <div class="kpaw_text--dark kpaw_weight--bold">Informasi Berlangganan</div>
    <div>
        <span class="kpaw_text--warning">Invoice ke {{ $pam->transactions->count() }} ({{ $lastTransaction->transaction_id }})</span>&nbsp;
        <span class="kpaw_weight--bold kpaw_text--danger">Unpaid</span>
    </div>
    <div>Untuk tanggal {{ formatDate($pam->date_start, 'd F Y') }} - {{ formatDate($pam->date_end, 'd F Y') }} (30 Hari)</div>
</div>

<div class="kpaw_summary--block">
    <div class="kpaw_text--dark kpaw_weight--bold">Rincian Biaya</div>
    <table class="kpaw_table--simple mb-0 pb-0">
        <tr>
            <td>Harga per pelanggan</td>
            <td> : </td>
            <td>{{ rupiah($activeCustomerPrice) }}</td>
        </tr>
        <tr>
            <td>Jumlah pelanggan</td>
            <td> : </td>
            <td>{{ $lastTransaction->total_amount / $activeCustomerPrice }} pelanggan</td>
        </tr>
        <tr>
            <td>Total Biaya</td>
            <td> : </td>
            <td>{{ $lastTransaction->rupiah_total_amount }}</td>
        </tr>
    </table>
    <div>Yang harus anda bayar sebesar</div>
    <div class="kpaw_highlight kpaw_text--primary">{{ $lastTransaction->rupiah_total_amount }}</div>
</div>

<div class="kpaw_summary--block">
    <div class="kpaw_text--dark kpaw_weight--bold">Informasi Pembayaran</div>
    <div>Silakan transfer sejumlah nominal di atas pada salah satu nomor rekening di bawah ini.</div>
</div>

<table class="kpaw_dual--column mb-3" style="border: none; border-collapse: collapse; cellspacing: 0; cellpadding: 0">
    <tr>
        @foreach (config('company.account') as $account)
            <td>
                <img class="mb-1" src="{{ asset($account['image']) }}" alt="Bank">
                <div class="kpaw_text--dark kpaw_weight--bold">{{ $account['number'] }}</div>
                <div>A.n {{ $account['on_behalf_of'] }}</div>
            </td>
        @endforeach
    </tr>
</table>

<div class="kpaw_note mb-3">
<div class="mb-2">Anda punya waktu sampai tanggal {{ now()->addDays(7)->endOfDay()->format('d/m/Y') }}
(7 hari dari terbitnya invoice ini) untuk segera
melakukan pembayaran.</div>

<div>Bila terdeteksi belum adanya transaksi, secara
otomatis akun akan dinonaktifkan.</div>
</div>
</div>

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
