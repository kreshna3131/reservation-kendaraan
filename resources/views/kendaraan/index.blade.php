@extends('layouts.app')
@section('blockhead')
<link rel="stylesheet" href="{{ asset('porto/vendor/datatables/media/css/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/dropdown-action.css') }}" />
@endsection
@section('title')
Kendaraan
@endsection
@section('content')
<header class="page-header page-header-left-inline-breadcrumb">
    <h2 class="kpaw_weight-bold">Kendaraan</h2>
    <div class="right-wrapper">
        <ol class="breadcrumbs">
            <li><a href="{{ route('kendaraan.index') }}">Kendaraan</a></li>
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
                                <a anim="ripple" href="{{ route('kendaraan.create') }}"
                                    class="kpaw_btn kpaw_btn--primary kpaw_weight--bold">Tambah</a>
                            </div>
                            <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                                <div class="input-group kpaw_form--inner-icon">
                                    <input type="text" class="form-control kpaw_form--control" placeholder="Search"
                                        id="search-member" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table kpaw_table kpaw_table--striped mb-0" style="min-width: 900px;">
                        <thead>
                            <tr>
                                <th width="7%">No</th>
                                <th width="5%">Foto</th>
                                <th width="">Jenis Kendaraan</th>
                                <th width="30%">Jumlah Unit</th>
                                <th width="14%">Tersedia</th>
                                <th width="14%">Sisa</th>
                                <th width="12%">Actions</th>
                            </tr>
                        </thead>
                        <tbody textalign="center">
                            <tr>
                                <td>1</td>
                                <td><img src="https://assets.ayobandung.com/crop/0x0:0x0/750x500/webp/photo/p1/77/2023/08/22/image-2116317303.png"
                                        alt="" style="max-width: 200px;"></td>
                                <td>Honda Vario</td>
                                <td>20 unit</td>
                                <td>11 unit</td>
                                <td>9 unit</td>
                                <td>
                                    <div class="kpaw_label kpaw_label--warning mb-2">Edit</div>
                                    {{-- <div class="kpaw_label kpaw_label--danger">Hapus</div> --}}
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="https://cdn0-production-images-kly.akamaized.net/qbAbeMYQpMQ676enTea_yev3P6Y=/1200x900/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/2830929/original/091089700_1560837842-AHM_BeATStreet._02_.jpg"
                                        alt="" style="max-width: 200px;"></td>
                                <td>Honda Beat</td>
                                <td>30 unit</td>
                                <td>11 unit</td>
                                <td>19 unit</td>
                                <td>
                                    <div class="kpaw_label kpaw_label--warning mb-2">Edit</div>
                                    {{-- <div class="kpaw_label kpaw_label--danger">Hapus</div> --}}
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img src="https://momotor.id/news/wp-content/uploads/2023/04/Yamaha-Aerox-155.jpg"
                                        alt="" style="max-width: 200px;"></td>
                                <td>Yamaha Aerox</td>
                                <td>5 unit</td>
                                <td>0 unit</td>
                                <td>5 unit</td>
                                <td>
                                    <div class="kpaw_label kpaw_label--warning mb-2">Edit</div>
                                    {{-- <div class="kpaw_label kpaw_label--danger">Hapus</div> --}}
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
<script src="{{ asset('assets/js/member/member-datatable.js') }}"></script>
<script src="{{ asset('assets/js/default-delete.js') }}"></script>
<script src="{{ asset('assets/js/modals.js') }}"></script>
<script src="{{ asset('assets/js/member/external-filter.js') }}"></script>
<script>
    const url = "{{ route('kendaraan.list') }}";
        let orderDatatable;
        let orderFalse = [1, 6];
        let visibleFalse = [];

        $("th").each(function (index, element) {
            $(element).hasClass("invisible") ? visibleFalse.push(index) : false;
        })

        $(function () {
            orderDatatable = initDatatables(url, orderFalse, visibleFalse);

            if ($("#alert-user-created").length) {
                const newUrl = window.location.href.split('?')[0];
                history.pushState({}, null, newUrl);
            }

            orderDatatable.on('draw', function () {
                const data = orderDatatable.rows({
                    'search': 'applied'
                }).data();

                const freeMember = data.filter(row => row[3].includes('Free'));
                $('#kpaw_free_member').text(freeMember.length);

                const premiumMember = data.filter(row => row[3].includes('Premium'));
                $('#kpaw_premium_member').text(premiumMember.length);

                const totalMember = data.length;
                $('#kpaw_total_member').text(totalMember);
            })
        })

        $('.kpaw_team').addClass('nav-expanded nav-active');
        $('.kpaw_team_all').addClass('nav-active');

</script>
@endsection
