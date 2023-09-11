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
{{-- <script src="{{ asset('assets/js/masterkendaraan/datatable-serverside.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/masterkendaraan/masterkendaraan-datatable.js') }}"></script> --}}
<script src="{{ asset('assets/js/default-delete.js') }}"></script>
<script src="{{ asset('assets/js/modals.js') }}"></script>
<script src="{{ asset('assets/js/default-ajax.js') }}"></script>
<script src="{{ asset('assets/js/default-datatable.js') }}"></script>

<script>
    let orderDatatable;
    let orderFalse = [1];
    let visibleFalse = [];

    $("th").each(function (index, element) {
        $(element).hasClass("invisible") ? visibleFalse.push(index) : false;
    })

    $(function () {
        orderDatatable = initDatatables(url, visibleFalse);
    })

    $(document).ready(function () {
        $('.kpaw_masterkendaraan').addClass('nav-expanded nav-active');
        $('.kpaw_masterkendaraan_all').addClass('nav-active');

        // Initialize DataTables
        var dataTable = $('.table').DataTable({
            sDom: '<"text-right mb-md"T><"d-none"lf><"table-responsive"t>pr',
            serverSide: true,
            language: {
                search: "",
                searchPlaceholder: "Search",
                processing: '<div class="d-flex justify-content-center align-items-center kpaw_dt_spinner"><div class="spinner-border text-light" role="status"></div> Sedang memproses</div>',
                loadingRecords: "",
                paginate: {
                    next: 'Next',
                    previous: 'Previous',
                },
                emptyTable: "Belum ada Data Kendaraan",
                zeroRecords: "Data Kendaraan yang kamu cari tidak ada",
            },
            ajax: {
                url: "{{ route('masterkendaraan.list') }}", // Replace with your data source URL
                type: "GET",
                dataSrc: 'data', // This specifies where the data is located in the JSON response
                error: function (res) {
                    // Handle errors here
                    console.log("Error:", res);
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
                {
                    data: "merkkendaraan"
                },
                {
                    data: "actions",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        // Customize the content of the "actions" column here
                        // return '<a href="' + edit_url + '" class="">' +
                        //     '<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">' +
                        //     '<g id="search">' +
                        //     '<rect id="Rectangle_13" data-name="Rectangle 13" width="24" height="24" fill="#5800FF" opacity="0"></rect>' +
                        //     '<path id="Path_1" data-name="Path 1" d="M20.71,19.29l-3.4-3.39A7.92,7.92,0,0,0,19,11a8,8,0,1,0-8,8,7.92,7.92,0,0,0,4.9-1.69l3.39,3.4a1,1,0,1,0,1.42-1.42ZM5,11a6,6,0,1,1,6,6,6,6,0,0,1-6-6Z" fill="#5800FF"></path>' +
                        //     '</g>' +
                        //     '</svg>' +
                        //     '</a>' +
                        //     '<a href="' + delete_url + '" class="">' +
                        //     '<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">' +
                        //     '<path id="Path_2" data-name="Path 2" d="M21,6H16V4.33A2.42,2.42,0,0,0,13.5,2h-3A2.42,2.42,0,0,0,8,4.33V6H3A1,1,0,0,0,3,8H4V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,4.33c0-.16.21-.33.5-.33h3c.29,0,.5.17.5.33V6H10ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V8H18Z" fill="#ff3b3b"></path>' +
                        //     '</svg>' +
                        //     '</a>';

                        return '<a href="' + row.edit_url + '" class="">' +
                            '<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">' +
                            '<g id="search">' +
                            '<rect id="Rectangle_13" data-name="Rectangle 13" width="24" height="24" fill="#5800FF" opacity="0"></rect>' +
                            '<path id="Path_1" data-name="Path 1" d="M20.71,19.29l-3.4-3.39A7.92,7.92,0,0,0,19,11a8,8,0,1,0-8,8,7.92,7.92,0,0,0,4.9-1.69l3.39,3.4a1,1,0,1,0,1.42-1.42ZM5,11a6,6,0,1,1,6,6,6,6,0,0,1-6-6Z" fill="#5800FF"></path>' +
                            '</g>' +
                            '</svg>' +
                            '</a>' +
                            '<a href="' + row.delete_url + '" class="">' +
                            '<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">' +
                            '<path id="Path_2" data-name="Path 2" d="M21,6H16V4.33A2.42,2.42,0,0,0,13.5,2h-3A2.42,2.42,0,0,0,8,4.33V6H3A1,1,0,0,0,3,8H4V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,4.33c0-.16.21-.33.5-.33h3c.29,0,.5.17.5.33V6H10ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V8H18Z" fill="#ff3b3b"></path>' +
                            '</svg>' +
                            '</a>';
                    }
                },
            ],
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
