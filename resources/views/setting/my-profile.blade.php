@extends('layouts.app')
@section('title')
    Profil Saya
@endsection
@section('blockhead')
<link rel="stylesheet" href="{{ asset('assets/css/team.css') }}" />
<link rel="stylesheet" href="{{ asset('porto/vendor/cropper/cropper.min.css') }}">
@endsection
@section('content')
    <header class="page-header page-header-left-inline-breadcrumb">
        <h2 class="font-weight-bold">Profil Saya</h2>
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li><a href="{{ route('dashboard.index') }}">Dashbord</a></li>
                <li><span>Pengaturan</span></li>
                <li><span>Profil Saya</span></li>
            </ol>
        </div>
    </header>

    <form action="{{ route('setting.updateMyProfile') }}" method="POST" class="kpaw_main_form">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info kpaw_form--container">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5 px-4">
                                <img src="{{ asset('assets/svg/icons/Add-New-User.svg') }}" alt="">
                                <h5 class="kpaw_weight--bold">Profil anda</h5>
                                <p>Tambahkan di sini deskripsi profil dengan semua detail dan informasi yang diperlukan.</p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5 kpaw_card--advanced">
                                <div class="form-group row">
                                    <label class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Nama Lengkap</label>
                                    <div class="col-lg-7 col-xl-8">
                                        <input
                                            type="text"
                                            class="form-control kpaw_form--control"
                                            name="name"
                                            value=""
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">NIK</label>
                                    <div class="col-lg-7 col-xl-8">
                                        <input
                                            type="text"
                                            class="form-control kpaw_form--control"
                                            name="nik"
                                            value=""
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Email</label>
                                    <div class="col-lg-7 col-xl-8">
                                        <input
                                            type="text"
                                            class="form-control kpaw_form--control"
                                            name="email"
                                            value=""
                                            {{-- disabled --}}
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">No.
                                        Telepon</label>
                                    <div class="col-lg-7 col-xl-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">62</div>
                                            <input type="number" class="form-control kpaw_form--control"
                                                name="handphone_number" value="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jeniskelamin"
                                        class="col-lg-5 col-xl-4 control-label kpaw_weight--semi-bold mt-2 mb-2 mb-lg-0">Jenis Kelamin</label>
                                    <div class="col-lg-7 col-xl-8">
                                        <select class="form-control kpaw_form--control w-100" id="team" name="status_team"
                                            data-plugin-selectTwo>
                                            <option value="" selected disabled title="Select">Select</option>
                                            <option value="pria">
                                                Pria
                                            </option>
                                            <option value="wanita">
                                                Wanita
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4 pt-3">
                                    <a
                                        anim="ripple"
                                        href="#"
                                        class="cancel-button btn kpaw_btn kpaw_btn--light-primary kpaw_weight--bold mr-3"
                                    >Batal</a>
                                    <button
                                        anim="ripple"
                                        type="submit"
                                        class="submit-button btn kpaw_btn kpaw_btn--primary kpaw_weight--bold"
                                    >Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </form>
@endsection
@section('blockfoot')
    <script src="{{ asset('assets/js/default-ajax.js') }}"></script>
    <script src="{{ asset('js/password-meter.js') }}"></script>
    <script>
        $('.kpaw_setting').addClass('nav-expanded nav-active');
        $('.kpaw_my_profile').addClass('nav-active');
    </script>
@endsection
