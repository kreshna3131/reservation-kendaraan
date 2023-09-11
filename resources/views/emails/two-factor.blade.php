@component('mail::layout')
	@slot('header')
		@component('mail::header', ['url' => config('app.url')])
			<img src="{{ asset('assets/images/logo/Logo-Email.png') }}" alt="Absensi">
		@endcomponent
	@endslot

	# Hallo, {{ $name }}

	Kode two factor authentication anda adalah :

	<div class="kpaw_security--code">
		{{ $code }}
	</div>

	Copy paste ke dalam form yang diminta oleh sistem. Bila ini dirasa cukup
	mengganggu, anda dapat menonaktifkan fitur ini melalui menu pengaturan
	di aplikasi.

	Jika anda tidak berkeinginan atau membatalkan untuk masuk ke aplikasi,
	tidak ada tindakan lebih lanjut yang diperlukan.

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
