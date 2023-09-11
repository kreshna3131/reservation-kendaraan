@extends('layouts.app')
@section('title')
Detail Master
@endsection
@section('blockhead')

<link rel="stylesheet" href="{{ asset('assets/css/masterkendaraan.css') }}" />
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
    <h2 class="kpaw_weight-bold">Detail Master</h2>
    <div class="right-wrapper">
        <ol class="breadcrumbs">
            <li><a href="{{ route('masterkendaraan.index') }}">Detail Master</a></li>
            <li><span>Detail</span></li>
        </ol>
    </div>
</header>
<div class="row">
    <div class="col">
        <section class="card card-modern card-big-info kpaw_form--container">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2-5 col-xl-1-5 px-4">
                        <img src="{{ asset('assets/svg/icons/Add-New-User.svg') }}" alt="">
                        <h5 class="kpaw_weight--bold">Master Kendaraan</h5>
                        <p class="mb-0">Semua form wajib untuk diisi.</p>
                    </div>
                    <div class="col-lg-3-5 col-xl-4-5 kpaw_card--advanced">
                        <div class="form-group row">
                        </div>
                        <form action="{{ route('masterkendaraan.update', $kendaraan->id) }}" method="POST"
                            class="kpaw_main_form" data-redirect="{{ route('masterkendaraan.index') }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label
                                    class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Jenis
                                    Kendaraan</label>
                                <div class="col-lg-7 col-xl-8">
                                    <select name="jeniskendaraan" id="jeniskendaraan"
                                        class="form-control kpaw_form--control select2-selection">
                                        {{-- Pilihan Merk Kendaraan --}}
                                        <option value="mobil" @if ($kendaraan->jeniskendaraan === 'mobil') selected
                                            @endif>Mobil</option>
                                        <option value="motor" @if ($kendaraan->jeniskendaraan === 'motor') selected
                                            @endif>Motor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Merk
                                    Kendaraan</label>
                                <div class="col-lg-7 col-xl-8">
                                    <input type="text" class="form-control kpaw_form--control" name="merkkendaraan"
                                        value="{{ $kendaraan->merkkendaraan }}" />
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
<script src="{{ asset('porto/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('porto/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script>
<script src="{{ asset('assets/js/masterkendaraan/create-ajax.js') }}"></script>
<script src="{{ asset('porto/vendor/cropper/cropper.min.js') }}"></script>
<script src="{{ asset('porto/vendor/compressor/compressor.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.kpaw_masterkendaraan').addClass('nav-expanded nav-active');
    $('.kpaw_masterkendaraan_create').addClass('nav-active');

    $(document).ready(function () {
        // Initialize Select2
        $('#merkkendaraan').select2();
    });
</script>
@endsection
