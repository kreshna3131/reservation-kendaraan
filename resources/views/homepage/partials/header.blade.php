<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>KendReserv<span>.</span></h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="/transport">Kendaraan</a></li>
                <li><a href="/about" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
                </li>
                <li><a href="/contact"
                        class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
                {{-- <li><a href="blog.html">Blog</a></li>
                <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li> --}}
                <a href="/login" class="btn kpaw_btn kpaw_btn--primary kpaw_weight--bold w-100"><i
                        class="fa-solid fa-right-to-bracket"></i>
                    Login</a>
                <a href="/register" class="btn kpaw_btn kpaw_btn--primary kpaw_weight--bold w-100"><i
                        class="fa-regular fa-address-card"></i>
                    Register</a>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
