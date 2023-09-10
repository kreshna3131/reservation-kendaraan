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
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mobil</td>
                                <td>Honda</td>
                                <td>
                                    <button
                                        class="btn btn-block kpaw_btn kpaw_btn--light-warning kpaw_weight--bold mb-2">Edit</button>
                                    <button class="btn btn-block kpaw_btn kpaw_btn--light-danger kpaw_weight--bold">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            url: "{{ route('kendaraan.list') }}",
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                var kendaraanTable = $('#kendaraan-table');

                // Hapus semua baris yang ada di tabel
                kendaraanTable.empty();

                // Tambahkan baris-baris baru berdasarkan data yang diterima
                $.each(data.data, function (index, row) {
                    kendaraanTable.append('<tr><td>' + row[0] + '</td><td>' + row[1] + '</td><td>' + row[2] + '</td><td>' + row[3] + '</td></tr>');
                });
            },
            error: function () {
                alert('Gagal mengambil data kendaraan.');
            }
        });
    });
</script> --}}
<script>
    const url = "{{ route('masterkendaraan.list') }}";
        let orderDatatable;
        let orderFalse = [1, 6];
        let visibleFalse = [];

        $("th").each(function (index, element) {
            $(element).hasClass("invisible") ? visibleFalse.push(index) : false;
        })

        $('.kpaw_masterkendaraan').addClass('nav-expanded nav-active');
        $('.kpaw_masterkendaraan_all').addClass('nav-active');

</script>
@endsection
