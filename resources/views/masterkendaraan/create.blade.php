@extends('layouts.app')
@section('title')
Master Kendaraan
@endsection
@section('blockhead')
<link rel="stylesheet" href="{{ asset('assets/css/team.css') }}" />
{{--
<link rel="stylesheet" href="{{ asset('porto/vendor/cropper/cropper.min.css') }}"> --}}
@endsection
@section('kpaw_action--submit')
{{-- <button anim="ripple" type="submit"
    class="submit-button btn kpaw_btn kpaw_btn--primary kpaw_weight--bold mr-5">Simpan
</button> --}}
@endsection
@section('content')
<header class="page-header page-header-left-inline-breadcrumb">
    <h2 class="kpaw_weight-bold">Master Kendaraan</h2>
    <div class="right-wrapper">
        <ol class="breadcrumbs">
            <li><a href="{{ route('masterkendaraan.index') }}">Master Kendaraan</a></li>
            <li><span>Tambah</span></li>
        </ol>
    </div>
</header>
<div class="row">
    <div class="col">
        <section class="card card-modern card-big-info kpaw_form--container">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2-5 col-xl-1-5 px-4">
                        <h5 class="kpaw_weight--bold">Master Kendaraan</h5>
                        <p class="mb-0">Semua form wajib untuk diisi.</p>
                    </div>
                    <div class="col-lg-3-5 col-xl-4-5 kpaw_card--advanced">
                        <form action="{{ route('masterkendaraan.store') }}" method="POST" class="kpaw_main_form"
                            data-redirect="{{ route('masterkendaraan.index') }}" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <label for="jeniskendaraan"
                                    class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Jenis
                                    Kendaraan</label>
                                <div class="col-lg-7 col-xl-8">
                                    <select class="form-control kpaw_form--control w-100" id="jeniskendaraan"
                                        name="jeniskendaraan" data-plugin-selectTwo>
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="mobil">Mobil</option>
                                        <option value="motor">Motor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="merkkendaraan"
                                    class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Merk
                                    Kendaraan</label>
                                <div class="col-lg-7 col-xl-8">
                                    <input type="text" class="form-control kpaw_form--control" id="merkkendaraan"
                                        name="merkkendaraan" value="{{ old('merkkendaraan') }}" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4 pt-3">
                                <a anim="ripple" href="{{ route('masterkendaraan.index') }}"
                                    class="cancel-button btn kpaw_btn kpaw_btn--light-primary kpaw_weight--bold mr-3">Batal</a>
                                <button anim="ripple" type="submit"
                                    class="submit-button btn kpaw_btn kpaw_btn--primary kpaw_weight--bold">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('blockfoot')
<script src="{{ asset('assets/js/masterkendaraan/create-ajax.js') }}"></script>
<script src="{{ asset('porto/vendor/compressor/compressor.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.kpaw_masterkendaraan').addClass('nav-expanded nav-active');
    $('.kpaw_masterkendaraan_create').addClass('nav-active');

    $(document).ready(function () {
        // Select2 Multiple
        $('.select2-selection').select2({
            placeholder: "Pilih Jenis",
            allowClear: true,
            maximumSelectionLength: 1,
            language: {
                maximumSelected: function (e) {
                    return "Anda hanya bisa memilih " + e.maximum + " jenis saja";
                }
            }
        });
    });

</script>
@endsection