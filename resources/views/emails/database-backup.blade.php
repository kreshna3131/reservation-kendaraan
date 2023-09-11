@component('mail::layout')
	@slot('header')
		@component('mail::header', ['url' => config('app.url')])
			<img src="{{ asset('assets/images/logo/Logo-Email.png') }}" alt="Absensi">
		@endcomponent
	@endslot

	# Hallo, Angelina Doe

	Database Anda telah dibackup pada tanggal {{ formatDate(now(), 'd F Y \j\a\m H:i') }}.
	Silakan download file sql yang tersedia!

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
