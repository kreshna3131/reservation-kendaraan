@component('mail::layout')
	@slot('header')
		@component('mail::header', ['url' => config('app.url')])
			{{ config('app.name') }}
		@endcomponent
	@endslot

	# Hallo

	Kami perlu memastikan bahwa email yang kamu inputkan adalah benar.
	Untuk melanjutkan pendaftaran, silakan klik tombol di bawah ini
	agar akun kamu aktif.

	@component('mail::button', ['url' => $url])
		Verifikasi Email
	@endcomponent

	Tautan email verifikasi ini akan kedaluwarsa kurang dari {{ config('auth.verification.expire') }} menit.
	Apabila kamu tidak jadi atau membatalkan pendaftaran di CMS Absensi,
	maka tidak ada tindakan lebih lanjut yang diperlukan.

	Salam Kami,<br>
	CMS Absensi

	@slot('footer')
		@component('mail::footer')
			&copy; {{ date('Y') }} CMS Absensi by KreshnaPutra.
		@endcomponent
	@endslot
@endcomponent
