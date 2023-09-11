@extends('layouts.app')
@section('blockhead')
	<link rel="stylesheet" href="{{ asset('porto/vendor/datatables/media/css/dataTables.bootstrap4.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/dropdown-action.css') }}" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('title')
	Master Kendaraan
@endsection
@section('content')
	<header class="page-header page-header-left-inline-breadcrumb">
		<h2 class="kpaw_weight-bold">Master Kendaraan</h2>
		<div class="right-wrapper">
			<ol class="breadcrumbs">
				<li><a href="{{ route('masterkendaraan.index') }}">Master Kendaraan</a></li>
				<li><span>Semua</span></li>
			</ol>
		</div>
	</header>

	<div class="row">
		<div class="col">
			<div class="card card-modern">
				<div class="card-body">
					<div class="datatables-header-footer-wrapper">
						<div class="datatable-header mb-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-12 col-lg-auto mb-2 mb-lg-0">
									<a anim="ripple" href="{{ route('masterkendaraan.create') }}"
										class="kpaw_btn kpaw_btn--primary kpaw_weight--bold">Tambah</a>
								</div>
								<div class="col-12 col-lg-4 mb-2 mb-lg-0">
									<div class="input-group kpaw_form--inner-icon">
										<input type="text" class="form-control kpaw_form--control" placeholder="Search"
											id="search-masterkendaraan" />
									</div>
								</div>
							</div>
						</div>

						<table class="table kpaw_table kpaw_table--striped mb-0" style="min-width: 900px;">
							<thead>
								<tr>
									<th width="7%">No</th>
									<th>Jenis Kendaraan</th>
									<th>Merk Kendaraan</th>
									<th width="15%">Actions</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>

						<div class="datatable-footer">
							<div class="row align-items-center justify-content-between">
								<div class="col-lg-auto text-center order-3 order-lg-2">
									<div class="results-info-wrapper"></div>
								</div>
								<div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
									<div class="pagination-wrapper"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- @include('include.modal-delete') --}}
@endsection
@section('blockfoot')
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="{{ asset('porto/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('porto/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('porto/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('porto/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script>
	<script src="{{ asset('assets/js/masterkendaraan/datatable-serverside.js') }}"></script>
	<script src="{{ asset('assets/js/masterkendaraan/masterkendaraan-datatable.js') }}"></script>
	<script src="{{ asset('assets/js/default-delete.js') }}"></script>
	<script src="{{ asset('assets/js/modals.js') }}"></script>
	<script src="{{ asset('assets/js/default-ajax.js') }}"></script>
	<script src="{{ asset('assets/js/default-datatable.js') }}"></script>

	<script>
		const url = "{{ route('masterkendaraan.list') }}";
		let orderFalse = [0]; // Hanya indeks 0 yang tidak dapat diurutkan
		let visibleFalse = [];

		$("th").each(function(index, element) {
			if ($(element).hasClass("invisible")) {
				visibleFalse.push(index);
			}
		});

		$(document).ready(function() {
			$('.kpaw_masterkendaraan').addClass('nav-expanded nav-active');
			$('.kpaw_masterkendaraan_all').addClass('nav-active');

			// Inisialisasi DataTable
			var dataTable = $('.table').DataTable({
				sDom: '<"text-right mb-md"T><"d-none"lf><"table-responsive"t>pr',
				serverSide: true,
				language: {
					search: "",
					searchPlaceholder: "Search",
					processing: '<div class="d-flex justify-content-center align-items-center kpaw_dt_spinner"><div class="spinner-border text-light" role="status"></div> Sedang memproses</div>',
					loadingRecords: "",
					paginate: {
						next: nextIcon,
						previous: previousIcon,
					},
					emptyTable: "Belum ada Data Kendaraan",
					zeroRecords: "Data Kendaraan yang kamu cari tidak ada",
				},
				order: [
					[0, "desc"]
				],
				processing: true,
				columnDefs: [{
						orderable: false,
						targets: orderFalse,
					},
					{
						visible: false,
						targets: visibleFalse,
					},
				],
				ajax: {
					url: url,
					type: "GET",
					data: function(d) {
						d.date = $("#date_filter").val();
						console.log(d.date);
					},
					error: function(res) {
						let errorList = "";
						if (typeof res.responseJSON.errors === "object") {
							$.each(res.responseJSON.errors, function(key, value) {
								if (value.length > 1) {
									$.each(value, function(key, value) {
										errorList += value + "<br/>";
									});
								} else {
									errorList += value + "<br/>";
								}
							});
						} else {
							errorList +=
							"Terjadi kesalahan pada sistem. Silakan reload ulang halaman ini.";
						}
						new PNotify({
							title: "Gagal!",
							text: errorList,
							icon: false,
							width: "340px",
							type: "error",
							animate_speed: "fast",
						});
						if (res.responseJSON?.status === "session_expired") {
							setTimeout(function() {
								window.location.reload();
							}, 1000);
						}
					},
				},
				columns: [{
						data: "DT_RowIndex",
						orderable: false,
						searchable: false
					},
					{
						data: "jeniskendaraan"
					},
				],

				// columns: [
				//     { data: "no" },
				//     { data: "jeniskendaraan" },
				//     { data: "merkkendaraan" }, // Kolom tambahan untuk merk kendaraan
				// ],
				drawCallback: function() {
					typeof callback == "function" && callback();
				},
			});
		});
	</script>


	{{-- <script>
    const url = "{{ route('masterkendaraan.list') }}";
    let orderDatatable;
    let orderFalse = [1];
    let visibleFalse = [3];

    $("th").each(function (index, element) {
        $(element).hasClass("invisible") ? visibleFalse.push(index) : false;
    })

    $('.kpaw_masterkendaraan').addClass('nav-expanded nav-active');
    $('.kpaw_masterkendaraan_all').addClass('nav-active');
</script> --}}
@endsection
