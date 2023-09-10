@extends('layouts.app')
@section('blockhead')
<link rel="stylesheet" href="{{ asset('porto/vendor/datatables/media/css/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/dropdown-action.css') }}" />
@endsection
@section('title')
Users
@endsection
@section('content')
<header class="page-header page-header-left-inline-breadcrumb">
    <h2 class="kpaw_weight-bold">Users</h2>
    <div class="right-wrapper">
        <ol class="breadcrumbs">
            <li><a href="{{ route('users.index') }}">Users</a></li>
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
                                <th width="4%">No</th>
                                {{-- <th width="5%">Foto</th> --}}
                                <th width="20%">Nama</th>
                                <th width="15%">Email</th>
                                <th width="10%">No Whatsapp</th>
                                <th width="10%">Lama Peminjaman</th>
                                <th width="12%">Waktu Peminjaman</th>
                                <th width="12%">Batas Pengembalian</th>
                                <th width="7%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                {{-- <td width="4%"><img src="" alt="" style="max-width: 40px;"></td> --}}
                                <td>Rudi Tabuti</td>
                                <td>mlehoy@gmail.com</td>
                                <td>081234567</td>
                                <td>Gatau dah</td>
                                <td>Senin, 1 Juli 2023, 07:00</td>
                                <td>Senin, 1 Juli 2023, 18:00</td>
                                <td>
                                    <button
                                        class="btn btn-block kpaw_btn kpaw_btn--light-warning kpaw_weight--bold mb-2">Edit</button>
                                    <button
                                        class="btn btn-block kpaw_btn kpaw_btn--light-danger kpaw_weight--bold">Hapus</button>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                {{-- <td></td> --}}
                                <td>Ipun</td>
                                <td>ipangantenk@gmail.com</td>
                                <td>081234567</td>
                                <td>Gatau dah</td>
                                <td>Rabu 3 Juli 2023 09.00</td>
                                <td>Kamis 4 Juli 2023 10.00</td>
                                <td>
                                    <button
                                        class="btn btn-block kpaw_btn kpaw_btn--light-warning kpaw_weight--bold mb-2">Edit</button>
                                    <button
                                        class="btn btn-block kpaw_btn kpaw_btn--light-danger kpaw_weight--bold">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                {{-- <td></td> --}}
                                <td>hemalia</td>
                                <td>hemaclalucayank@gmail.com</td>
                                <td>081234567</td>
                                <td>Gatau dah</td>
                                <td>Rabu 3 Juli 2023 07.00</td>
                                <td>Rabu 3 Juli 2023 12.00</td>
                                <td>
                                    <button
                                        class="btn btn-block kpaw_btn kpaw_btn--light-warning kpaw_weight--bold mb-2">Edit</button>
                                    <button
                                        class="btn btn-block kpaw_btn kpaw_btn--light-danger kpaw_weight--bold">Hapus</button>
                                </td>
                            </tr>
                            {{-- @foreach ($staticData as $memberData)
                            <tr>
                                <td>{{ $memberData['id'] }}</td>
                                <td></td>
                                <td>{{ $memberData['name'] }}</td>
                                <td>{{ $memberData['email'] }}</td>
                                <td>{{ $memberData['department'] }}</td>
                                <td>{{ $memberData['user_name'] }}</td>
                                <td>{!! $memberData['html_status_team'] !!}</td>
                                <td>
                                    <!-- Tambahkan tombol aksi sesuai kebutuhan Anda -->
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Hapus</button>
                                </td>
                            </tr>
                            @endforeach --}}


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
    const url = "{{ route('users.list') }}";
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

        $('.kpaw_user').addClass('nav-expanded nav-active');
        $('.kpaw_user_all').addClass('nav-active');
</script>

@endsection