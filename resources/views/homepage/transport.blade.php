<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>KendResev - Transport</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/homepage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/homepage/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/homepage/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/homepage/vendor/aos/aos.css" rel="stylesheet') }}">
    <link href="{{ asset('assets/homepage/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/homepage/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ assets('assets/vendor') }}"> --}}

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/homepage/css/homepage.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: UpConstruction
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('homepage.partials.header')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('assets/homepage/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Transport</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Transport</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="section-header">
                    <h2>Pilih Kendaraan</h2>
                    <select class="form-select">
                        <option selected>Filter</option>
                        <optgroup label="Label 1">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </optgroup>
                        <optgroup label="Label 2">
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                        </optgroup>
                    </select>
                    {{-- <div class="dropdown" style="float: right">
                        <button class="btn btn-warning" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Filter <i class="bi bi-filter"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div> --}}
                </div>

                <div class="row gy-4 posts-list">
                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100">
                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/homepage/img/blog/blog-1.jpg" class="img-fluid" alt="">
                                <span class="post-date" style="background:green">Tersedia</span>
                            </div>
                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">Honda BeAT</h3>
                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <span class="px-3 text-black-50">/</span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-cash"></i> <span class="ps-2"><s>Rp 100.000</s> Rp
                                                50.000</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi
                                    praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                                </p>
                                <button class="btn btn-outline-warning" onclick="warning()">Reservasi</button>
                            </div>
                        </div>
                    </div><!-- End post list item -->

                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100">
                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/homepage/img/blog/blog-2.jpg" class="img-fluid" alt="">
                                <span class="post-date" style="background:red">Tidak Tersedia</span>
                            </div>
                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">Yamaha Nmax 155</h3>
                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <span class="px-3 text-black-50">/</span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-cash"></i> <span class="ps-2"><s>Rp 150.000</s> Rp
                                                100.000</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum
                                    voluptatum et. Quo libero rerum voluptatem pariatur nam.
                                </p>
                                <button class="btn btn-outline-warning" onclick="warning()">Reservasi</button>
                            </div>
                        </div>
                    </div><!-- End post list item -->

                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100">
                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/homepage/img/blog/blog-2.jpg" class="img-fluid" alt="">
                                <span class="post-date" style="background:green">Tersedia</span>
                            </div>
                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">Honda Vario 160.</h3>
                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <span class="px-3 text-black-50">/</span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-cash"></i> <span class="ps-2"><s>Rp 110.000</s> Rp
                                                90.000</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum
                                    voluptatum et. Quo libero rerum voluptatem pariatur nam.
                                </p>
                                <button class="btn btn-outline-warning" onclick="warning()">Reservasi</button>
                            </div>
                        </div>
                    </div><!-- End post list item -->
                </div><!-- End blog posts list -->

                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div><!-- End blog pagination -->
            </div>
        </section><!-- End Blog Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Pricing</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="box">
                            <h3>Free</h3>
                            <h4><sup>$</sup>0<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li class="na">Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                        <div class="box featured">
                            <h3>Business</h3>
                            <h4><sup>$</sup>19<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box">
                            <h3>Developer</h3>
                            <h4><sup>$</sup>29<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box">
                            <span class="advanced">Advanced</span>
                            <h3>Ultimate</h3>
                            <h4><sup>$</sup>49<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Pricing Section -->
    </main><!-- End #main -->

    @include('homepage.partials.footer')

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/homepage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/homepage/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/homepage/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/homepage/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/homepage/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/homepage/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/homepage/vendor/php-email-form/validate.js') }}"></script>

    {{-- sweetalert transport homepage --}}
    <script type="text/javascript">
        function warning() {
            Swal.fire(
                'Login',
                'Silahkan Login terlebih dahulu!',
                'warning'
            )
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- end sweetalert transport homepage --}}

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/homepage/js/homepage.js') }}"></script>

</body>

</html>
