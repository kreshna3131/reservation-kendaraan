@extends('layouts.app')
@section('title')
Kendaraan
@endsection
@section('blockhead')
<link rel="stylesheet" href="{{ asset('assets/css/team.css') }}" />
<link rel="stylesheet" href="{{ asset('porto/vendor/cropper/cropper.min.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
@section('kpaw_action--submit')
{{-- <button anim="ripple" type="submit"
    class="submit-button btn kpaw_btn kpaw_btn--primary kpaw_weight--bold mr-5">Simpan
</button> --}}
@endsection
@section('content')
<header class="page-header page-header-left-inline-breadcrumb">
    <h2 class="kpaw_weight-bold">Kendaraan</h2>
    <div class="right-wrapper">
        <ol class="breadcrumbs">
            <li><a href="{{ route('kendaraan.index') }}">Kendaraan</a></li>
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
                        <img src="{{ asset('assets/svg/icons/Add-New-User.svg') }}" alt="">
                        <h5 class="kpaw_weight--bold">Tambah Kendaraaan</h5>
                        <p class="mb-0">Semua form wajib untuk diisi.</p>
                    </div>
                    <div class="col-lg-3-5 col-xl-4-5 kpaw_card--advanced">
                        <div class="form-group row">
                            <p class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Foto
                            </p>
                            <div class="col-lg-7 col-xl-8 flex">
                                <div class="kpaw_input_photo"
                                    data-image="{{ asset('path_to_previous_uploaded_image.jpg') }}"
                                    style="background-image: url('{{ asset('path_to_previous_uploaded_image.jpg') }}');">
                                    <img src="{{ asset('assets/svg/icons/Upload-Logo.svg') }}"
                                        class="kpaw_profile_photo" alt="">
                                </div>
                                <input type="file" accept="image/*" id="photo" class="kpaw_custom_input_file d-none"
                                    name="photo" value="" />
                                <div class="kpaw_wrapper">
                                    <label class="" for="photo">
                                        <a class="button-upload kpaw_btn kpaw_btn--light-primary kpaw_btn--square">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <g id="vuesax_bulk_document-upload"
                                                    data-name="vuesax/bulk/document-upload"
                                                    transform="translate(-364 -188)">
                                                    <g id="document-upload">
                                                        <path class="kpaw_custom" id="Vector"
                                                            d="M18,8.19H15.11a4.306,4.306,0,0,1-4.3-4.3V1a1,1,0,0,0-1-1H5.57A5.277,5.277,0,0,0,0,5.57v8.86A5.277,5.277,0,0,0,5.57,20h7.86A5.277,5.277,0,0,0,19,14.43V9.19A1,1,0,0,0,18,8.19Z"
                                                            transform="translate(366.5 190)" fill="#5800FF"
                                                            opacity="0.4" />
                                                        <path class="kpaw_custom" id="Vector-2" data-name="Vector"
                                                            d="M1.12.195A.654.654,0,0,0,0,.635v3.49a2.726,2.726,0,0,0,2.75,2.67c.95.01,2.27.01,3.4.01a.631.631,0,0,0,.47-1.07C5.18,4.285,2.6,1.675,1.12.195Z"
                                                            transform="translate(378.68 190.015)" fill="#5800FF" />
                                                        <path class="kpaw_custom" id="Vector-3" data-name="Vector"
                                                            d="M5.278,2.22l-2-2c-.01-.01-.02-.01-.02-.02a.855.855,0,0,0-.22-.15h-.02A1.027,1.027,0,0,0,2.777,0H2.7a.646.646,0,0,0-.19.04.488.488,0,0,0-.07.03.662.662,0,0,0-.22.15l-2,2a.75.75,0,0,0,1.06,1.06L2,2.56V6.75a.75.75,0,0,0,1.5,0V2.56l.72.72a.748.748,0,0,0,1.06,0A.754.754,0,0,0,5.278,2.22Z"
                                                            transform="translate(370.253 198.25)" fill="#5800FF" />
                                                        <path class="kpaw_custom" id="Vector-4" data-name="Vector"
                                                            d="M0,0H24V24H0Z" transform="translate(364 188)" fill="none"
                                                            opacity="0" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    </label>
                                    <button
                                        class="btn kpaw_btn kpaw_btn--light-danger kpaw_btn--square button-delete ml-2 mb-3 p-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <g id="vuesax_bulk_forbidden-2" data-name="vuesax/bulk/forbidden-2"
                                                transform="translate(-108 -700)">
                                                <g id="forbidden-2">
                                                    <path class="kpaw_custom" id="Vector" d="M0,0H24V24H0Z"
                                                        transform="translate(108 700)" fill="none" opacity="0" />
                                                    <path class="kpaw_custom" id="Vector-2" data-name="Vector"
                                                        d="M12.9,0H7.1A3.475,3.475,0,0,0,4.98.88L.88,4.98A3.475,3.475,0,0,0,0,7.1v5.8a3.475,3.475,0,0,0,.88,2.12l4.1,4.1A3.475,3.475,0,0,0,7.1,20h5.8a3.475,3.475,0,0,0,2.12-.88l4.1-4.1A3.475,3.475,0,0,0,20,12.9V7.1a3.475,3.475,0,0,0-.88-2.12L15.02.88A3.475,3.475,0,0,0,12.9,0Z"
                                                        transform="translate(110 702)" fill="#f1416c" opacity="0.4" />
                                                    <path class="kpaw_custom" id="Vector-3" data-name="Vector"
                                                        d="M5.307,4.247l2.97-2.97A.75.75,0,0,0,7.218.218l-2.97,2.97L1.277,.218a.75.75,0,0,0-1.06,1.06l2.97,2.97L.218,7.218a.754.754,0,0,0,0,1.06.748.748,0,0,0,1.06,0l2.97-2.97,2.97,2.97a.748.748,0,0,0,1.06,0,.754.754,0,0,0,0-1.06Z"
                                                        transform="translate(115.753 707.753)" fill="#f1416c" />
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                <p class="kpaw_form--note mb-0">Unggah gambar kendaraan dengan ukuran 600 x 600 pixel.
                                </p>
                                <p class="kpaw_form--note mt-0 mb-0">Jenis file yang diizinkan png, jpg, dan jpeg. </p>
                            </div>
                        </div>
                        <form action="{{ route('kendaraan.store') }}" method="POST" class="kpaw_main_form"
                            data-redirect="{{ route('kendaraan.index') }}" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <label
                                    class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Nama
                                </label>
                                <div class="col-lg-7 col-xl-8">
                                    <input type="text" class="form-control kpaw_form--control" name="name"
                                        value="{{ old('name') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Jenis
                                    Kendaraan</label>
                                <div class="col-lg-7 col-xl-8">
                                    <input type="text" class="form-control kpaw_form--control" name="jenis_kendaraan"
                                        value="{{ old('jenis_kendaraan') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Jumlah
                                    Unit</label>
                                <div class="col-lg-7 col-xl-8">
                                    <input type="number" class="form-control kpaw_form--control" name="jumlah_unit"
                                        value="{{ old('jumlah_unit') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Harga
                                    Sewa</label>
                                <div class="col-lg-7 col-xl-8">
                                    <input type="number" class="form-control kpaw_form--control" name="harga_sewa"
                                        value="{{ old('harga_sewa') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Keterangan
                                    </label>
                                <div class="col-lg-7 col-xl-8">
                                    <input type="number" class="form-control kpaw_form--control" name="keterangan"
                                        value="{{ old('keterangan') }}" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4 pt-3">
                                <a anim="ripple" href="{{ route('kendaraan.index') }}"
                                    class="cancel-button btn kpaw_btn kpaw_btn--light-primary kpaw_weight--bold mr-3">Batal</a>
                                <button anim="ripple" type="submit"
                                    class="submit-button btn kpaw_btn kpaw_btn--primary kpaw_weight--bold">Simpan</button>
                            </div>
                        </form>
                        <div class="modal kpaw_modal--cropper fade" id="cropper-modal" data-backdrop="static"
                            tabindex="-1" aria-labelledby="cropper-modal-label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div id="cropper-element">
                                            <img id="cropper-photo" src="" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn kpaw_btn kpaw_btn--light-primary kpaw_weight--semi-bold"
                                            data-dismiss="modal">Batal</button>
                                        <button id="cropper-save" type="button"
                                            class="btn kpaw_btn kpaw_btn--primary kpaw_weight--semi-bold">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script src="{{ asset('assets/js/kendaraan/create-ajax.js') }}"></script>
<script src="{{ asset('assets/js/kendaraan/additional.js') }}"></script>
<script src="{{ asset('porto/vendor/cropper/cropper.min.js') }}"></script>
<script src="{{ asset('porto/vendor/compressor/compressor.min.js') }}"></script>
<script>
    $('.kpaw_kendaraan').addClass('nav-expanded nav-active');
        $('.kpaw_kendaraan_create').addClass('nav-active');

        $("[name='birth_date']").datepicker({
            format: 'dd-mm-yyyy',
            endDate: 'tomorrow',
            language: "id",
            autoclose: true,
            todayHighlight: true
        });
</script>
@endsection
