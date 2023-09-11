@component('mail::layout')
	@slot('header')
		@component('mail::header', ['url' => config('app.url')])
			<img src="{{ asset('assets/images/logo/Logo-Email.png') }}" alt="Absensi">
		@endcomponent
	@endslot

	# Hallo, {{ $user->name }}

	Anda telah didaftarkan sebagai team pada sistem CMS Absensi. Agar dapat
	login untuk pertama kalinya, silakan buat password terlebih dahulu
	melalui tombol di bawah ini.

	@component('mail::button', ['color' => 'primary', 'url' => $url])
		Buat Password
	@endcomponent

	Apabila tidak menginginkan menjadi team pada sistem kami, tidak
	ada tindakan lebih lanjut yang diperlukan.

	Salam Kami,<br>
	<span class="kpaw_signature">CMS Absensi</span>

	@slot('footer')
		@component('mail::footer')
			&copy; Copyright {{ date('Y') }} CMS Absensi. All Rights Reserved.
			{{-- &copy; Copyright 2023 Absensi. All Rights Reserved. --}}
			<br>
			by KreshnaPutra.
		@endcomponent
	@endslot
@endcomponent
