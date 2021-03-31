<!-- ========== HEADER ========== -->
<header id="header" class="u-header u-header-left-aligned-nav">
    <div class="u-header__section" id="navbar">
        <!-- Topbar -->

        <!-- End Topbar -->

        <!-- Logo-Search-header-icons -->
        <div class="py-2 py-xl-5 bg-primary-down-lg">
            <div class="container my-0dot5 my-xl-0">
                <div class="row align-items-center">
                    <!-- Logo-offcanvas-menu -->
                    <div class="col-auto">
                        <!-- Nav -->
                        <nav
                            class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                            <!-- Logo -->
                            <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center"
                                href="{{url('/')}}" aria-label="Electro" style="margin:0 auto">
                                <img style="margin-right:11px;margin-bottom:5%"
                                    src="{{ asset('assets/img/logosvg.svg') }}" alt="logo" style="padding-left: 30px;">
                            </a>
                            <!-- End Logo -->
                            <!-- Fullscreen Toggle Button -->
                            <button id="sidebarHeaderInvokerMenu" type="button"
                                class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0 d-lg-none"
                                aria-controls="sidebarHeader" aria-haspopup="true" aria-expanded="false"
                                data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                                data-unfold-duration="500">
                                <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                    <span class="u-hamburger__inner"></span>
                                </span>
                            </button>
                            <!-- End Fullscreen Toggle Button -->
                        </nav>
                        <!-- End Nav -->
                        <!-- ========== HEADER SIDEBAR ========== -->
                        <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left"
                            aria-labelledby="sidebarHeaderInvoker">
                            <div class="u-sidebar__scroller">
                                <div class="u-sidebar__container">
                                    <div class="u-header-sidebar__footer-offset">
                                        <!-- Toggle Button -->
                                        <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-4 bg-white">
                                            <button type="button" class="close ml-auto" aria-controls="sidebarHeader"
                                                aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                                data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarHeader1"
                                                data-unfold-type="css-animation" data-unfold-animation-in="fadeInLeft"
                                                data-unfold-animation-out="fadeOutLeft" data-unfold-duration="500">
                                                <span aria-hidden="true"><i
                                                        class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                            </button>
                                        </div>
                                        <!-- End Toggle Button -->

                                        <!-- Content -->
                                        <div class="js-scrollbar u-sidebar__body">
                                            <div id="headerSidebarContent"
                                                class="u-sidebar__content u-header-sidebar__content">
                                                <!-- Logo -->
                                                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center mb-3"
                                                    href="index.html" aria-label="Electro">
                                                    <img src="assets/img/logosvg.svg" alt="logo">
                                                </a>
                                                <!-- End Logo -->

                                                <!-- List -->
                                                <ul id="headerSidebarList" class="u-header-collapse__nav">
                                                    <!-- Value of the Day -->
                                                    <li class="">
                                                        <a class="u-header-collapse__nav-link font-weight-bold"
                                                            href="#">Value of the Day</a>
                                                    </li>
                                                    <!-- End Value of the Day -->

                                                    <!-- Top 100 Offers -->
                                                    <li class="">
                                                        <a class="u-header-collapse__nav-link font-weight-bold"
                                                            href="#">Top 100 Offers</a>
                                                    </li>
                                                    <!-- End Top 100 Offers -->

                                                    <!-- New Arrivals -->
                                                    <li class="">
                                                        <a class="u-header-collapse__nav-link font-weight-bold"
                                                            href="#">New Arrivals</a>
                                                    </li>
                                                    <!-- End New Arrivals -->

                                                    <!-- Computers & Accessories -->
                                                    <li class="u-has-submenu u-header-collapse__submenu">
                                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                            href="javascript:;"
                                                            data-target="#headerSidebarComputersCollapse" role="button"
                                                            data-toggle="collapse" aria-expanded="false"
                                                            aria-controls="headerSidebarComputersCollapse">
                                                            Computers & Accessories
                                                        </a>

                                                        <div id="headerSidebarComputersCollapse" class="collapse"
                                                            data-parent="#headerSidebarContent">
                                                            <ul class="u-header-collapse__nav-list">
                                                                <li><span
                                                                        class="u-header-sidebar__sub-menu-title">Computers
                                                                        &amp; Accessories</span></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Computers & Accessories</a></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Laptops, Desktops & Monitors</a></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Printers & Ink</a></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Networking & Internet Devices</a></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Computer Accessories</a></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Software</a></li>
                                                                <li><span
                                                                        class="u-header-sidebar__sub-menu-title">Office
                                                                        & Stationery</span></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Office & Stationery</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Electronics</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <!-- End Computers & Accessories -->

                                                    <!-- Cameras, Audio & Video -->
                                                    <li class="u-has-submenu u-header-collapse__submenu">
                                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                            href="javascript:;"
                                                            data-target="#headerSidebarCamerasCollapse" role="button"
                                                            data-toggle="collapse" aria-expanded="false"
                                                            aria-controls="headerSidebarCamerasCollapse">
                                                            Cameras, Audio & Video
                                                        </a>

                                                        <div id="headerSidebarCamerasCollapse" class="collapse"
                                                            data-parent="#headerSidebarContent">
                                                            <ul class="u-header-collapse__nav-list">
                                                                <li><span
                                                                        class="u-header-sidebar__sub-menu-title">Cameras
                                                                        & Photography</span></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Lenses</a></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Camera Accessories</a></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Security & Surveillance</a></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Binoculars & Telescopes</a></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Camcorders</a></li>
                                                                <li class=""><a
                                                                        class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Software</a></li>
                                                                <li><span class="u-header-sidebar__sub-menu-title">Audio
                                                                        & Video</span></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Audio & Video</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Headphones & Speakers</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Electronics</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <!-- End Cameras, Audio & Video -->

                                                    <!-- Mobiles & Tablets -->
                                                    <li class="u-has-submenu u-header-collapse__submenu">
                                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                            href="javascript:;"
                                                            data-target="#headerSidebarMobilesCollapse" role="button"
                                                            data-toggle="collapse" aria-expanded="false"
                                                            aria-controls="headerSidebarMobilesCollapse">
                                                            Mobiles & Tablets
                                                        </a>

                                                        <div id="headerSidebarMobilesCollapse" class="collapse"
                                                            data-parent="#headerSidebarContent">
                                                            <ul class="u-header-collapse__nav-list">
                                                                <li><span
                                                                        class="u-header-sidebar__sub-menu-title">Mobiles
                                                                        & Tablets</span></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Mobile Phones</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Smartphones</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Refurbished Mobiles</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Cases & Covers</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Mobile Accessories</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Cases & Covers</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Tablets</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Tablet Accessories</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Electronics</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <!-- End Mobiles & Tablets -->

                                                    <!-- Movies, Music & Video -->
                                                    <li class="u-has-submenu u-header-collapse__submenu">
                                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                            href="javascript:;"
                                                            data-target="#headerSidebarMoviesCollapse" role="button"
                                                            data-toggle="collapse" aria-expanded="false"
                                                            aria-controls="headerSidebarMoviesCollapse">
                                                            Movies, Music & Video
                                                        </a>

                                                        <div id="headerSidebarMoviesCollapse" class="collapse"
                                                            data-parent="#headerSidebarContent">
                                                            <ul class="u-header-collapse__nav-list">
                                                                <li><span
                                                                        class="u-header-sidebar__sub-menu-title">Movies
                                                                        & TV Shows</span></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Movies & TV Shows</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All English</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Hindi</a></li>
                                                                <li><span class="u-header-sidebar__sub-menu-title">Video
                                                                        Games</span></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">PC Games</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Consoles</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Accessories</a></li>
                                                                <li><span
                                                                        class="u-header-sidebar__sub-menu-title">Music</span>
                                                                </li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Music</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Indian Classical</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Musical Instruments</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <!-- End Movies, Music & Video -->

                                                    <!-- TV & Audio -->
                                                    <li class="u-has-submenu u-header-collapse__submenu">
                                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                            href="javascript:;" data-target="#headerSidebarTvCollapse"
                                                            role="button" data-toggle="collapse" aria-expanded="false"
                                                            aria-controls="headerSidebarTvCollapse">
                                                            TV & Audio
                                                        </a>

                                                        <div id="headerSidebarTvCollapse" class="collapse"
                                                            data-parent="#headerSidebarContent">
                                                            <ul class="u-header-collapse__nav-list">
                                                                <li><span class="u-header-sidebar__sub-menu-title">Audio
                                                                        & Video</span></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Audio & Video</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Televisions</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Headphones</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Speakers</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Audio & Video Accessories</a></li>
                                                                <li><span
                                                                        class="u-header-sidebar__sub-menu-title">Music</span>
                                                                </li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Televisions</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Headphones</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Electro Home Appliances</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <!-- End TV & Audio -->

                                                    <!-- Watches & Eyewear -->
                                                    <li class="u-has-submenu u-header-collapse__submenu">
                                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                            href="javascript:;"
                                                            data-target="#headerSidebarWatchesCollapse" role="button"
                                                            data-toggle="collapse" aria-expanded="false"
                                                            aria-controls="headerSidebarWatchesCollapse">
                                                            Watches & Eyewear
                                                        </a>

                                                        <div id="headerSidebarWatchesCollapse" class="collapse"
                                                            data-parent="#headerSidebarContent">
                                                            <ul class="u-header-collapse__nav-list">
                                                                <li><span
                                                                        class="u-header-sidebar__sub-menu-title">Watches</span>
                                                                </li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Watches</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Men's Watches</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Women's Watches</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Premium Watches</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Deals on Watches</a></li>
                                                                <li><span
                                                                        class="u-header-sidebar__sub-menu-title">Eyewear</span>
                                                                </li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Men's Sunglasses</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <!-- End Watches & Eyewear -->

                                                    <!-- Car, Motorbike & Industrial -->
                                                    <li class="u-has-submenu u-header-collapse__submenu">
                                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                            href="javascript:;" data-target="#headerSidebarCarCollapse"
                                                            role="button" data-toggle="collapse" aria-expanded="false"
                                                            aria-controls="headerSidebarCarCollapse">
                                                            Car, Motorbike & Industrial
                                                        </a>

                                                        <div id="headerSidebarCarCollapse" class="collapse"
                                                            data-parent="#headerSidebarContent">
                                                            <ul class="u-header-collapse__nav-list">
                                                                <li><span class="u-header-sidebar__sub-menu-title">Car &
                                                                        Motorbike</span></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Cars & Bikes</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Car & Bike Care</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Lubricants</a></li>
                                                                <li><span class="u-header-sidebar__sub-menu-title">Shop
                                                                        for Bike</span></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Helmets & Gloves</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Bike Parts</a></li>
                                                                <li><span
                                                                        class="u-header-sidebar__sub-menu-title">Industrial
                                                                        Supplies</span></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Industrial Supplies</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Lab & Scientific</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <!-- End Car, Motorbike & Industrial -->

                                                    <!-- Accessories -->
                                                    <li class="u-has-submenu u-header-collapse__submenu">
                                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                            href="javascript:;"
                                                            data-target="#headerSidebarAccessoriesCollapse"
                                                            role="button" data-toggle="collapse" aria-expanded="false"
                                                            aria-controls="headerSidebarAccessoriesCollapse">
                                                            Accessories
                                                        </a>

                                                        <div id="headerSidebarAccessoriesCollapse" class="collapse"
                                                            data-parent="#headerSidebarContent">
                                                            <ul class="u-header-collapse__nav-list">
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Cases</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Chargers</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Headphone Accessories</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Headphone Cases</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Headphones</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">All Industrial Supplies</a></li>
                                                                <li><a class="u-header-collapse__submenu-nav-link"
                                                                        href="#">Lab & Scientific</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <!-- End Accessories -->
                                                </ul>
                                                <!-- End List -->
                                            </div>
                                        </div>
                                        <!-- End Content -->
                                    </div>
                                    <!-- Footer -->
                                    <footer id="SVGwaveWithDots" class="svg-preloader u-header-sidebar__footer">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item pr-3">
                                                <a class="u-header-sidebar__footer-link text-gray-90"
                                                    href="#">Privacy</a>
                                            </li>
                                            <li class="list-inline-item pr-3">
                                                <a class="u-header-sidebar__footer-link text-gray-90" href="#">Terms</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="u-header-sidebar__footer-link text-gray-90" href="#">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </li>
                                        </ul>

                                        <!-- SVG Background Shape -->
                                        <div class="position-absolute right-0 bottom-0 left-0 z-index-n1">
                                            <img class="js-svg-injector"
                                                src="../../assets/svg/components/wave-bottom-with-dots.svg"
                                                alt="Image Description" data-parent="#SVGwaveWithDots">
                                        </div>
                                        <!-- End SVG Background Shape -->
                                    </footer>
                                    <!-- End Footer -->
                                </div>
                            </div>
                        </aside>
                        <!-- ========== END HEADER SIDEBAR ========== -->
                    </div>
                    <!-- End Logo-offcanvas-menu -->
                    <!-- Search Bar -->
                    <div class="col d-none d-xl-block">
                        <form method="GET" action="{{ route('searchitem') }}" class="js-focus-state">
                            <label class="sr-only" for="searchproduct">Search</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary"
                                    name="product_name" id="searchproduct-item" placeholder="Search for Products"
                                    aria-label="Search for Products" aria-describedby="searchProduct1" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="submit"
                                        id="searchProduct1">
                                        <span class="ec ec-search font-size-24"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Search Bar -->
                    <!-- Header Icons -->
                    <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                        <div class="d-inline-flex">
                            <ul class="d-flex list-unstyled mb-0 align-items-center">
                                <!-- Search -->
                                <li class="col d-xl-none px-2 px-sm-3 position-static">
                                    <a id="searchClassicInvoker"
                                        class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary"
                                        href="javascript:;" role="button" data-toggle="tooltip" data-placement="top"
                                        title="Search" aria-controls="searchClassic" aria-haspopup="true"
                                        aria-expanded="false" data-unfold-target="#searchClassic"
                                        data-unfold-type="css-animation" data-unfold-duration="300"
                                        data-unfold-delay="300" data-unfold-hide-on-scroll="true"
                                        data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                        <span class="ec ec-search"></span>
                                    </a>

                                    <!-- Input -->
                                    <div id="searchClassic"
                                        class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2"
                                        aria-labelledby="searchClassicInvoker">

                                        <form method="GET" action="{{ route('searchitem') }}"
                                            class="js-focus-state input-group px-3">
                                            <input class="form-control" type="search" placeholder="Search Product"
                                                name="product_name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary px-3" type="submit"><i
                                                        class="font-size-18 ec ec-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Input -->
                                </li>
                                <!-- End Search -->

                                {{-- href="{{url('my-account')}}" --}}
                                @if(!Auth::check())
                                <li class="col d-none d-xl-block" style="
                                   text-align: center"><a class="text-gray-90" data-toggle="tooltip"
                                        data-placement="top" title="Sign-In"><i data-toggle="modal"
                                            data-target="#myModals" class="font-size-22 ec ec-user"></i>
                                        <div style="font-size:12px;" data-toggle="modal" data-target="#myModals"> Signup
                                        </div>


                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        x
                                      </button> --}}
                                    </a>

                                </li>
                                @elseif(Auth::user()->hasRole('admin'))


                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle text-white" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{url('home')}}">Go to Dashboard</a>

                                        <a class="dropdown-item" href="{{url('logout')}}"> Logout</a>

                                    </div>
                                </div>

                                @else
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle text-white" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        My Account
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{url('my-account')}}">Go to Profile</a>

                                        <a class="dropdown-item" href="{{url('logout')}}"> Logout</a>

                                    </div>
                                </div>
                                @endif
                                <li class="col d-none d-xl-block text-center"><a href="#" class="text-gray-90"
                                        data-toggle="tooltip" data-placement="top" title="Compare">
                                        <svg id="Capa_1" enable-background="new 0 0 512 512" height="20"
                                            viewBox="0 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">

                                            <g>
                                                <path
                                                    d="m411 262.862v-47.862c0-69.822-46.411-129.001-110-148.33v-21.67c0-24.813-20.187-45-45-45s-45 20.187-45 45v21.67c-63.59 19.329-110 78.507-110 148.33v47.862c0 61.332-23.378 119.488-65.827 163.756-4.16 4.338-5.329 10.739-2.971 16.267s7.788 9.115 13.798 9.115h136.509c6.968 34.192 37.272 60 73.491 60 36.22 0 66.522-25.808 73.491-60h136.509c6.01 0 11.439-3.587 13.797-9.115s1.189-11.929-2.97-16.267c-42.449-44.268-65.827-102.425-65.827-163.756zm-170-217.862c0-8.271 6.729-15 15-15s15 6.729 15 15v15.728c-4.937-.476-9.94-.728-15-.728s-10.063.252-15 .728zm15 437c-19.555 0-36.228-12.541-42.42-30h84.84c-6.192 17.459-22.865 30-42.42 30zm-177.67-60c34.161-45.792 52.67-101.208 52.67-159.138v-47.862c0-68.925 56.075-125 125-125s125 56.075 125 125v47.862c0 57.93 18.509 113.346 52.671 159.138z" />
                                                <path
                                                    d="m451 215c0 8.284 6.716 15 15 15s15-6.716 15-15c0-60.1-23.404-116.603-65.901-159.1-5.857-5.857-15.355-5.858-21.213 0s-5.858 15.355 0 21.213c36.831 36.831 57.114 85.8 57.114 137.887z" />
                                                <path
                                                    d="m46 230c8.284 0 15-6.716 15-15 0-52.086 20.284-101.055 57.114-137.886 5.858-5.858 5.858-15.355 0-21.213-5.857-5.858-15.355-5.858-21.213 0-42.497 42.497-65.901 98.999-65.901 159.099 0 8.284 6.716 15 15 15z" />
                                            </g>
                                        </svg>
                                        <div style="font-size:12px;text-align:center;margin-bottom:1px"> Notification
                                        </div>
                                    </a></li>
                                <li class="col d-none d-xl-block text-center">
                                    <a href="{{url('wishlist')}}" class="text-gray-90" data-toggle="tooltip"
                                        data-placement="top" title="Favorites"><i class="font-size-22 ec ec-favorites"
                                            style="margin-right:10%"></i>
                                        <div style="font-size:12px;text-align:center;margin-bottom:-4px"> Wishlist
                                        </div>
                                    </a>

                                </li>
                           
                                <li class="col d-xl-none px-2 px-sm-3">
                                    <a data-toggle="modal" data-target=".bd-example-modal-lg" class="text-gray-90"
                                        data-toggle="tooltip" data-placement="top" title="My Account"><i
                                            class="font-size-22 ec ec-user" style="margin-left:10%"></i>

                                    </a>

                                </li>
                                <li class="col pr-xl-0 px-2 px-sm-3 d-xl-none">
                                    <a href="../shop/cart.html" class="text-gray-90 position-relative d-flex "
                                        data-toggle="tooltip" data-placement="top" title="Cart">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 512 512"
                                            width="30" height="30">
                                            <path
                                                d="M496,264c0-28.567-7.026-54.255-20.635-76.293,12.222-11.572,28.241-34.564,13.439-67.8,5.825-14.409,9.276-40.137-12.366-54.565a8,8,0,1,0-8.876,13.312c8.275,5.517,10.095,13.862,9.63,21.309a24,24,0,1,0,.951,39.409c2.473,15.283-3.893,26.856-12.086,35.119A152.04,152.04,0,0,0,430.4,142.316C392.3,117.25,340.289,104,280,104c-49.018,0-96.057,9.376-133.639,26.524-12.154-28.315-39.521-34.114-40.792-34.369A8,8,0,0,0,96,104c0,4.15-4.271,14.642-7.155,20.422-7.537,15.075-6.961,31.323,1.5,46.335-5.139,6.54-8.531,13.013-10.108,19.3C74.291,213.853,58.64,222.173,54.48,224H40a24.027,24.027,0,0,0-24,24v16a24.027,24.027,0,0,0,24,24H53.227c26.329,20.266,52.5,21.314,70.034,18.518A98.339,98.339,0,0,0,144,300.791v90.226l-7.761,31.043A8,8,0,0,0,144,432h48a8,8,0,0,0,8-8V393.3l20.916-62.749A238.132,238.132,0,0,0,341.235,342.9a221.9,221.9,0,0,0,45.926-12.122l20.513,61.539-7.435,29.739A8,8,0,0,0,408,432h48a8,8,0,0,0,8-8V392.983L495.761,265.94A7.977,7.977,0,0,0,496,264ZM464,128a8,8,0,1,1,8-8A8.009,8.009,0,0,1,464,128ZM32,264V248a8.009,8.009,0,0,1,8-8h8v32H40A8.009,8.009,0,0,1,32,264ZM154.246,416l4-16H184v16Zm264,0,4-16H448v16Zm31.508-32H421.767L399.59,317.47a7.95,7.95,0,0,0-1.483-2.616l-.029-.035c-.144-.169-.294-.33-.451-.486-.052-.052-.105-.1-.158-.153-.128-.12-.258-.237-.394-.348-.1-.081-.2-.157-.3-.233s-.211-.157-.32-.23c-.149-.1-.3-.194-.461-.286-.072-.041-.142-.085-.215-.125-.057-.03-.11-.066-.168-.1C394.484,312.284,368,298.318,368,264a8,8,0,0,0-16,0c0,27.214,13.1,44.49,23.6,53.974a212.6,212.6,0,0,1-37.452,9.217,222.1,222.1,0,0,1-119.07-14.576,8,8,0,0,0-10.667,4.855L186.233,384H160V288a8.01,8.01,0,0,0-12.316-6.735C145.951,282.367,105.7,307.3,64,276.1V237.108c8.659-4.662,25.149-16.722,31.76-43.162,1.285-5.126,4.882-11.044,10.4-17.115a8,8,0,0,0,.622-9.985c-8.247-11.721-9.468-23.586-3.627-35.268a119.207,119.207,0,0,0,6.9-16.972,43.861,43.861,0,0,1,23.952,29.071,8,8,0,0,0,11.345,5.08C181.979,130.213,229.8,120,280,120c56.338,0,106.627,12.672,141.6,35.684C460.08,181,479.724,217.11,480,263.027Z" />
                                            <circle cx="104" cy="232" r="8" /></svg>
                                       

                                        <span
                                            class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12"
                                            id="notification_bell">
                                            @if (Auth::check())
                                            {{$cart_count}}
                                            @else
                                            
                                            @endif

                                        </span>
                                        @if (Auth::check())
                                        <span
                                            class="d-none d-xl-block font-weight-bold font-size-14 text-gray-90">€{{ $sum }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li class="col pr-xl-0 px-2 px-sm-3 d-none d-xl-block">
                                    <div id="basicDropdownHoverInvoker" class="text-gray-90 position-relative d-flex "
                                        data-toggle="tooltip" data-placement="top" title="Cart"
                                        aria-controls="basicDropdownHover" aria-haspopup="true" aria-expanded="false"
                                        data-unfold-event="click" data-unfold-target="#basicDropdownHover"
                                        data-unfold-type="css-animation" data-unfold-duration="300"
                                        data-unfold-delay="300" data-unfold-hide-on-scroll="true"
                                        data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                           
                                        <div class="row">
                                            @if (Auth::check())
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 512 512"
                                            width="26" height="26" style="margin:auto">
                                            <path
                                                d="M496,264c0-28.567-7.026-54.255-20.635-76.293,12.222-11.572,28.241-34.564,13.439-67.8,5.825-14.409,9.276-40.137-12.366-54.565a8,8,0,1,0-8.876,13.312c8.275,5.517,10.095,13.862,9.63,21.309a24,24,0,1,0,.951,39.409c2.473,15.283-3.893,26.856-12.086,35.119A152.04,152.04,0,0,0,430.4,142.316C392.3,117.25,340.289,104,280,104c-49.018,0-96.057,9.376-133.639,26.524-12.154-28.315-39.521-34.114-40.792-34.369A8,8,0,0,0,96,104c0,4.15-4.271,14.642-7.155,20.422-7.537,15.075-6.961,31.323,1.5,46.335-5.139,6.54-8.531,13.013-10.108,19.3C74.291,213.853,58.64,222.173,54.48,224H40a24.027,24.027,0,0,0-24,24v16a24.027,24.027,0,0,0,24,24H53.227c26.329,20.266,52.5,21.314,70.034,18.518A98.339,98.339,0,0,0,144,300.791v90.226l-7.761,31.043A8,8,0,0,0,144,432h48a8,8,0,0,0,8-8V393.3l20.916-62.749A238.132,238.132,0,0,0,341.235,342.9a221.9,221.9,0,0,0,45.926-12.122l20.513,61.539-7.435,29.739A8,8,0,0,0,408,432h48a8,8,0,0,0,8-8V392.983L495.761,265.94A7.977,7.977,0,0,0,496,264ZM464,128a8,8,0,1,1,8-8A8.009,8.009,0,0,1,464,128ZM32,264V248a8.009,8.009,0,0,1,8-8h8v32H40A8.009,8.009,0,0,1,32,264ZM154.246,416l4-16H184v16Zm264,0,4-16H448v16Zm31.508-32H421.767L399.59,317.47a7.95,7.95,0,0,0-1.483-2.616l-.029-.035c-.144-.169-.294-.33-.451-.486-.052-.052-.105-.1-.158-.153-.128-.12-.258-.237-.394-.348-.1-.081-.2-.157-.3-.233s-.211-.157-.32-.23c-.149-.1-.3-.194-.461-.286-.072-.041-.142-.085-.215-.125-.057-.03-.11-.066-.168-.1C394.484,312.284,368,298.318,368,264a8,8,0,0,0-16,0c0,27.214,13.1,44.49,23.6,53.974a212.6,212.6,0,0,1-37.452,9.217,222.1,222.1,0,0,1-119.07-14.576,8,8,0,0,0-10.667,4.855L186.233,384H160V288a8.01,8.01,0,0,0-12.316-6.735C145.951,282.367,105.7,307.3,64,276.1V237.108c8.659-4.662,25.149-16.722,31.76-43.162,1.285-5.126,4.882-11.044,10.4-17.115a8,8,0,0,0,.622-9.985c-8.247-11.721-9.468-23.586-3.627-35.268a119.207,119.207,0,0,0,6.9-16.972,43.861,43.861,0,0,1,23.952,29.071,8,8,0,0,0,11.345,5.08C181.979,130.213,229.8,120,280,120c56.338,0,106.627,12.672,141.6,35.684C460.08,181,479.724,217.11,480,263.027Z" />
                                            <circle cx="104" cy="232" r="8" /></svg>

                                       
                                            <span
                                                class="d-none d-xl-block font-weight-bold font-size-14 text-gray-90 ml-4" id="sumPrice">€@if($cart_count >0){{ $sum }}@else 0.00 @endif</span>
                                          
                                        <span id="counterID" class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">                                         
                                            {{$cart_count}}

                                        </span>
                                        
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 512 512"
                                        width="26" height="26" style="margin-top:-13px;">
                                        <path
                                            d="M496,264c0-28.567-7.026-54.255-20.635-76.293,12.222-11.572,28.241-34.564,13.439-67.8,5.825-14.409,9.276-40.137-12.366-54.565a8,8,0,1,0-8.876,13.312c8.275,5.517,10.095,13.862,9.63,21.309a24,24,0,1,0,.951,39.409c2.473,15.283-3.893,26.856-12.086,35.119A152.04,152.04,0,0,0,430.4,142.316C392.3,117.25,340.289,104,280,104c-49.018,0-96.057,9.376-133.639,26.524-12.154-28.315-39.521-34.114-40.792-34.369A8,8,0,0,0,96,104c0,4.15-4.271,14.642-7.155,20.422-7.537,15.075-6.961,31.323,1.5,46.335-5.139,6.54-8.531,13.013-10.108,19.3C74.291,213.853,58.64,222.173,54.48,224H40a24.027,24.027,0,0,0-24,24v16a24.027,24.027,0,0,0,24,24H53.227c26.329,20.266,52.5,21.314,70.034,18.518A98.339,98.339,0,0,0,144,300.791v90.226l-7.761,31.043A8,8,0,0,0,144,432h48a8,8,0,0,0,8-8V393.3l20.916-62.749A238.132,238.132,0,0,0,341.235,342.9a221.9,221.9,0,0,0,45.926-12.122l20.513,61.539-7.435,29.739A8,8,0,0,0,408,432h48a8,8,0,0,0,8-8V392.983L495.761,265.94A7.977,7.977,0,0,0,496,264ZM464,128a8,8,0,1,1,8-8A8.009,8.009,0,0,1,464,128ZM32,264V248a8.009,8.009,0,0,1,8-8h8v32H40A8.009,8.009,0,0,1,32,264ZM154.246,416l4-16H184v16Zm264,0,4-16H448v16Zm31.508-32H421.767L399.59,317.47a7.95,7.95,0,0,0-1.483-2.616l-.029-.035c-.144-.169-.294-.33-.451-.486-.052-.052-.105-.1-.158-.153-.128-.12-.258-.237-.394-.348-.1-.081-.2-.157-.3-.233s-.211-.157-.32-.23c-.149-.1-.3-.194-.461-.286-.072-.041-.142-.085-.215-.125-.057-.03-.11-.066-.168-.1C394.484,312.284,368,298.318,368,264a8,8,0,0,0-16,0c0,27.214,13.1,44.49,23.6,53.974a212.6,212.6,0,0,1-37.452,9.217,222.1,222.1,0,0,1-119.07-14.576,8,8,0,0,0-10.667,4.855L186.233,384H160V288a8.01,8.01,0,0,0-12.316-6.735C145.951,282.367,105.7,307.3,64,276.1V237.108c8.659-4.662,25.149-16.722,31.76-43.162,1.285-5.126,4.882-11.044,10.4-17.115a8,8,0,0,0,.622-9.985c-8.247-11.721-9.468-23.586-3.627-35.268a119.207,119.207,0,0,0,6.9-16.972,43.861,43.861,0,0,1,23.952,29.071,8,8,0,0,0,11.345,5.08C181.979,130.213,229.8,120,280,120c56.338,0,106.627,12.672,141.6,35.684C460.08,181,479.724,217.11,480,263.027Z" />
                                        <circle cx="104" cy="232" r="8" /></svg>

                                        @endif

                                    </div>
                                    </div>
                                    <div id="basicDropdownHover" style="overflow-x: hidden;"
                                        class="cart-dropdown dropdown-menu dropdown-unfold border-top border-top-primary mt-3 border-width-2 border-left-0 border-right-0 border-bottom-0 left-auto right-0"
                                        aria-labelledby="basicDropdownHoverInvoker">
                                        <ul class="list-unstyled px-3 pt-3">
                                            <li class="border-bottom pb-3 mb-3">
                                                <div id="cart-main-top">
                                                    @if(Auth::check())

                                                    {{-- <div class="dropdown show">

                                                        <a class="" href="#" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">User's Collection</a>
                                                        <div class="dropdown-menu show"
                                                            aria-labelledby="dropdownMenuButton">
                                                            @foreach ($collections as $item)
                                                            <a class="dropdown-item" href="">{{ $item->name }}</a>
                                                            @endforeach

                                                        </div>
                                                    </div> --}}

                                                   
                                                        {{-- <a class="nav-link u-header__nav-link" href="#" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">Receitas</a> --}}
                    
                                                <div class="dropdown">
                                                    {{-- <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Dropdown button
                                                    </button> --}}
                                                    <a class="nav-link u-header__nav-link btn btn-primary text-white" href="#" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">User's Collection</a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    @foreach ($collections as $item)
                                                                    <a class="dropdown-item" href="{{route('showSpecific' , $item->id ??"")}}">{{$item->name??""}}</a>
                                                                    {{-- {{ dd($item) }} --}}
                                                                    @endforeach
                                                            </div><br><br>
                                                            
                                                </div>
                                                

                                                    @foreach($cart as $c)
                                                    <ul class="list-unstyled row mx-n2">
                                                        <li class="px-2 col-auto">

                                                            <img class="img-fluid" height="70px" width="70px"
                                                                src="{{asset('product/'.$c['stores'][0]['image'])}}"
                                                                alt="Image Description">

                                                            {{-- <img src="{{url ($cart->product_links[0]->image)}}"
                                                            height="50px"/></a> --}}
                                                        </li>
                                                        <li class="px-2 col">
                                                            <h5 class="text-blue font-size-14 font-weight-bold">
                                                                {{$c['name']}}</h5>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <span
                                                                        class="proPrice font-size-14">{{$c['stores'][0]['price']}}</span>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <!-- Quantity -->
                                                                    <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1 mr-0"
                                                                        style="float: right;padding:0 !important">
                                                                        <div class="js-quantity row align-items-center">
                                                                            <div class="col">
                                                                                <input
                                                                                    class="js-result form-control h-auto border-0 rounded p-0 shadow-none"
                                                                                    type="text" value="1" id="1">
                                                                            </div>
                                                                            <div class="col-auto pr-1">
                                                                                <button
                                                                                    class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 d-block"
                                                                                    id="sub">
                                                                                    <small
                                                                                        class="fas fa-minus btn-icon__inner"></small>
                                                                                </button>
                                                                                <button
                                                                                    class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                                                    id="add">
                                                                                    <small
                                                                                        class="fas fa-plus btn-icon__inner"></small>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- End Quantity -->
                                                                </div>

                                                            </div>
                                                        </li>

                                                        <li class="px-2 col-auto">
                                                            {{-- {{ dd($c) }} --}}
                                                            {{-- <span class="badge badge-secondary">{{ $c['stores'][0]['website_
                                                                '] }}</span>
                                                            --}}
                                                            <img class="img-fluid"
                                                                src="{{ asset('product/'.$c['stores'][0]['website_logo'])}}"
                                                                alt="Image Description" height="25px" width="25px">

                                                            {{-- <a href="{{ route('cart.destroy' , $c->id)}}"
                                                            class="text-gray-90"><i class="ec ec-close-remove"></i></a>
                                                            --}}
                                                            
                                                                <button type="button" class="delete-cart-product" data-id="{{$c['product_id']}}"
                                                                    style="background:transparent;border:none">
                                                                    <i class="ec ec-close-remove"></i>
                                                                </button>
                                                            
                                                        </li>


                                                        {{-- <button type="submit" class="btn-xs">Save Collection</button> --}}
                                                    </ul>
                                                    <br/>
                                                  
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </li>

                                        </ul>
                                        @if (Auth::check())
                                        <div class="row">
                                            <a style="margin-left: 13%" href="{{ route('collection.index') }}"
                                            class="btn btn-outline-primary btn-sm ">Save Collection</a>

                                            <div
                                            class="d-none d-xl-block font-weight-bold font-size-14 text-gray-100" id="cartSum" style="margin-left:20%;margin-top:2% "></div>
                                        </div>
                                        @else
                                        <a style="margin-left: 5%"  data-toggle="modal" data-target="#myModals"
                                        class="btn btn-outline-primary btn-sm ">Save Collection</a>
                                        @endif

                                      

                                        <div class="flex-center-between px-4 pt-2">
                     
                                        @if (Auth::check())
                                        <a 
                                        class="btn btn-secondary mb-3 mb-md-0" href="{{ route('viewCart') }}">Ver lista de compras</a>
                                        @else 
                                        <a 
                                            class="btn btn-secondary mb-3 mb-md-0" href="#" data-toggle="modal" data-target="#myModals">Ver lista de compras</a>
                                        @endif
                                            
                                            
                                                <a href="{{ route('collection.create') }}"
                                                class="btn btn-primary ml-md-2 text-white" >Comparar preços</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- End Header Icons -->
                </div>
            </div>
        </div>
        <!-- End Logo-Search-header-icons -->

        <!-- Vertical-and-secondary-menu -->
        <div class="d-none d-xl-block container">
            <div class="row">
                <!-- Vertical Menu -->
                <div class="col-md-auto d-none d-xl-block">
                    <div class="max-width-270 min-width-270">
                        <!-- Basics Accordion -->
                        <div id="basicsAccordion">
                            <!-- Card -->
                            <div class="card border-0">
                                <div class="card-header card-collapse border-0" id="basicsHeadingOne">
                                    <button type="button"
                                        class="btn-link btn-remove-focus btn-block d-flex card-btn py-3 text-lh-1 px-4 shadow-none btn-primary rounded-top-lg border-0 font-weight-bold text-gray-90"
                                        data-toggle="collapse" data-target="#basicsCollapseOne" aria-expanded="true"
                                        aria-controls="basicsCollapseOne">
                                        <span class="ml-0 text-gray-90 mr-2">
                                            <span class=" ec ec-list-view" id="category_list"></span>
                                        </span>
                                        <span class="pl-1 text-gray-90 " id="category">Categorias</span>
                                    </button>
                                </div>
                                <div id="basicsCollapseOne" class="collapse show vertical-menu"
                                    aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion">
                                    <div class="card-body p-0">
                                        <nav
                                            class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized">
                                            <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                                <ul class="navbar-nav u-header__navbar-nav border-primary border-top-0"
                                                    id="over-flow">
                                                    <li class="nav-item u-header__nav-item">

                                                        @foreach ($categories as $item)
                                                        <a href="{{route('category.search',$item->id)}}" class="nav-link u-header__nav-link" style="display: block;"><img
                                                                src="{{ asset("/category_image") . '/'. $item->image }}"
                                                                height="30" />
                                                            <span style="">{{ $item->category_name }}</span>
                                                        </a>
                                                        @endforeach


                                                    </li>

                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Basics Accordion -->
                    </div>
                </div>
                <!-- End Vertical Menu -->
                <!-- Secondary Menu -->
                <div class="col">
                    <!-- Nav -->
                    <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                        <!-- Navigation -->
                        <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                            <ul class="navbar-nav u-header__navbar-nav">
                                <!-- Home -->
                                <li class="nav-item u-header__nav-item">
                                    <a class="nav-link u-header__nav-link" aria-haspopup="true" aria-expanded="false"
                                        aria-labelledby="pagesSubMenu">Melhores Promoções</a>
                                </li>
                                <!-- End Home -->

                                <!-- Featured Brands -->
                                <li class="nav-item u-header__nav-item">
                                    {{-- <a class="nav-link u-header__nav-link" href="#" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">Receitas</a> --}}

                                    {{-- <div class="dropdown">
                                       
                                        <a class="nav-link u-header__nav-link" href="#" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Receitas</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach ($recipecategories as $item)
                                            <a class="dropdown-item"
                                                href="{{ route('categoryposts',$item->id) }}">{{ $item -> name }}</a>

                                            @endforeach
                                        </div> --}}
                                                             <div class="dropdown">
                                       
                                        <a class="nav-link u-header__nav-link" href="{{url('/blogs')}}" type="button"
                                            id="dropdownMenuButton" 
                                            >Receitas</a>
                                        {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach ($recipecategories as $item)
                                            <a class="dropdown-item"
                                                href="{{ route('categoryposts',$item->id) }}">{{ $item -> name }}</a>

                                            @endforeach
                                        </div> --}}
                                    </div>
                                </li>
                                <!-- End Featured Brands -->
                                <!-- End Featured Brands -->

                                <!-- Trending Styles -->
                                <li class="nav-item u-header__nav-item">
                                    <a class="nav-link u-header__nav-link" href="#" aria-haspopup="true"
                                        aria-expanded="false" aria-labelledby="blogSubMenu">Listas de Compras</a>
                                </li>
                                <!-- End Trending Styles -->

                            </ul>
                        </div>
                        <!-- End Navigation -->
                    </nav>
                    <!-- End Nav -->
                </div>
                <!-- End Secondary Menu -->
            </div>
        </div>
        <!-- End Vertical-and-secondary-menu -->
    </div>
</header>
<!-- ========== END HEADER ========== -->



<!-- Modal -->
<div class="modal fade" id="myModals" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header border-0">
                <h5 class='col-12 modal-title text-center' style="font-weight: bolder;">SIGN IN
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </h5>
              </div>

            <div class="modal-body">
                <form class="js-validate" novalidate="novalidate" action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="form-label" for="signinSrEmailExample3">Email
                            <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" name="email" placeholder="Username or Email address" style="border-radius: 0.4rem;border: 1px solid #000;"  required autocomplete="off">
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="form-label" for="signinSrPasswordExample2">Password <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required style="border-radius: 0.4rem; border: 1px solid #000;" autocomplete="off">
                    </div>
                    <!-- End Form Group -->

                    <!-- Checkbox -->
                    
                    <div class="js-form-message mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="rememberCheckbox"
                                        name="rememberCheckbox" data-error-class="u-has-error"
                                        data-success-class="u-has-success">
                                    <label class="custom-control-label form-label" for="rememberCheckbox">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="text-black" href="#"> <u>Lost your password?</u></a>
                            </div>
                        </div>
                        
                       
                    </div>
                    <!-- End Checkbox -->
                

                    <!-- Button -->
                    <div class="mb-1 text-center">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-black px-5"style="border-radius: 0rem">Login</button>
                        </div>
                        <div class="mb-2">
                            <a class="text-black" href="{{url('my-account')}}"> <u>Register now</u></a>
                        </div>
                    </div>
                    <!-- End Button -->
                   <div class="text-center">
                    <a href="login/google"> <img
                        src="assets\img\search.svg" alt="" height="40px" width="40px"
                        class="mr-3"></a>
                
                
                <a href="login/facebook" > <img
                        src="assets\img\facebook-logo.png" alt="" height="50px" width="50px"
                        class="mr-3"></a>
                   </div>

                </form>
            </div>

        </div>
    </div>
</div>
</div>
