<div class="py-2 py-xl-4 bg-primary-down-lg">
    <div class="container my-0dot5 my-xl-0">
        <div class="row align-items-center">
            <!-- Logo-offcanvas-menu -->
            <div class="col-auto">
                <!-- Nav -->
                <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                    <!-- Logo -->
                    <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="{{url('/')}}" aria-label="Electro">
                        <img src="assets/img/logo.jpeg" alt="logo">
                    </a>
                    <!-- End Logo -->

                    <!-- Fullscreen Toggle Button -->
                    <button id="sidebarHeaderInvokerMenu" type="button" class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0" aria-controls="sidebarHeader" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation" data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft" data-unfold-duration="500">
                        <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                            <span class="u-hamburger__inner"></span>
                        </span>
                    </button>
                    <!-- End Fullscreen Toggle Button -->
                </nav>
                <!-- End Nav -->

                <!-- ========== HEADER SIDEBAR ========== -->
                <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvokerMenu">
                    <div class="u-sidebar__scroller">
                        <div class="u-sidebar__container">
                            <div class="u-header-sidebar__footer-offset pb-0">
                                <!-- Toggle Button -->
                                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                                    <button type="button" class="close ml-auto" aria-controls="sidebarHeader" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation" data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft" data-unfold-duration="500">
                                        <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                    </button>
                                </div>
                                <!-- End Toggle Button -->

                                <!-- Content -->
                                <div class="js-scrollbar u-sidebar__body">
                                    <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                                        <!-- Logo -->
                                        <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical" href="{{url('/')}}" aria-label="Electro">
                                            <img src="assets/img/logo.jpeg" alt="logo">
                                        </a>
                                        <!-- End Logo -->

                                        <!-- List -->
                                        <ul id="headerSidebarList" class="u-header-collapse__nav">
                                            <!-- Home Section -->
                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarHomeCollapse" data-target="#headerSidebarHomeCollapse">
                                                    Home & Static Pages
                                                </a>

                                                <div id="headerSidebarHomeCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                    <ul id="headerSidebarHomeMenu" class="u-header-collapse__nav-list">
                                                        <!-- Home - v1 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/index.html">Home v1</a></li>
                                                        <!-- End Home - v1 -->
                                                        <!-- Home - v2 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/home-v2.html">Home v2</a></li>
                                                        <!-- End Home - v2 -->
                                                        <!-- Home - v3 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/home-v3.html">Home v3</a></li>
                                                        <!-- End Home - v3 -->
                                                        <!-- Home - v3-full-color-bg -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/home-v3-full-color-bg.html">Home v3.1</a></li>
                                                        <!-- End Home - v3-full-color-bg -->
                                                        <!-- Home - v4 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/home-v4.html">Home v4</a></li>
                                                        <!-- End Home - v4 -->
                                                        <!-- Home - v5 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/home-v5.html">Home v5</a></li>
                                                        <!-- End Home - v5 -->
                                                        <!-- Home - v6 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/home-v6.html">Home v6</a></li>
                                                        <!-- End Home - v6 -->
                                                        <!-- Home - v7 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/home-v7.html">Home v7</a></li>
                                                        <!-- End Home - v7 -->
                                                        <!-- About -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="{{url('about')}}">About</a></li>
                                                        <!-- End About -->
                                                        <!-- Contact v1 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="{{url('contact-us')}}">Contact v1</a></li>
                                                        <!-- End Contact v1 -->
                                                        <!-- Contact v2 -->
                                                        <!-- <li><a class="u-header-collapse__submenu-nav-link" href="../home/contact-v2.html">Contact v2</a></li> -->
                                                        <!-- End Contact v2 -->
                                                        <!-- FAQ -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/faq.html">FAQ</a></li>
                                                        <!-- End FAQ -->
                                                        <!-- Store Directory -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/store-directory.html">Store Directory</a></li>
                                                        <!-- End Store Directory -->
                                                        <!-- Terms and Conditions -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/terms-and-conditions.html">Terms and Conditions</a></li>
                                                        <!-- End Terms and Conditions -->
                                                        <!-- 404 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../home/404.html">404</a></li>
                                                        <!-- End 404 -->
                                                    </ul>
                                                </div>
                                            </li>
                                            <!-- End Home Section -->

                                            <!-- Shop Pages -->
                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarPagesCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarPagesCollapse">
                                                    Shop Pages
                                                </a>

                                                <div id="headerSidebarPagesCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                    <ul id="headerSidebarPagesMenu" class="u-header-collapse__nav-list">
                                                        <!-- Shop Grid -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-grid.html">Shop Grid</a></li>
                                                        <!-- End Shop Grid -->

                                                        <!-- Shop Grid Extended -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-grid-extended.html">Shop Grid Extended</a></li>
                                                        <!-- End Shop Grid Extended -->

                                                        <!-- Shop List View -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-list-view.html">Shop List View</a></li>
                                                        <!-- End Shop List View -->

                                                        <!-- Shop List View Small -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-list-view-small.html">Shop List View Small</a></li>
                                                        <!-- End Shop List View Small -->

                                                        <!-- Shop Left Sidebar -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                                        <!-- End Shop Left Sidebar -->

                                                        <!-- Shop Full width -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-full-width.html">Shop Full width</a></li>
                                                        <!-- End Shop Full width -->

                                                        <!-- Shop Right Sidebar -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                        <!-- End Shop Right Sidebar -->
                                                    </ul>
                                                </div>
                                            </li>
                                            <!-- End Shop Pages -->

                                            <!-- Product Categories -->
                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarBlogCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarBlogCollapse">
                                                    Product Categories
                                                </a>

                                                <div id="headerSidebarBlogCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                    <ul id="headerSidebarBlogMenu" class="u-header-collapse__nav-list">
                                                        <!-- 4 Column Sidebar -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/product-categories-4-column-sidebar.html">4 Column Sidebar</a></li>
                                                        <!-- End 4 Column Sidebar -->

                                                        <!-- 5 Column Sidebar -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/product-categories-5-column-sidebar.html">5 Column Sidebar</a></li>
                                                        <!-- End 5 Column Sidebar -->

                                                        <!-- 6 Column Full width -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/product-categories-6-column-full-width.html">6 Column Full width</a></li>
                                                        <!-- End 6 Column Full width -->

                                                        <!-- 7 Column Full width -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/product-categories-7-column-full-width.html">7 Column Full width</a></li>
                                                        <!-- End 7 Column Full width -->
                                                    </ul>
                                                </div>
                                            </li>
                                            <!-- End Product Categories -->

                                            <!-- Single Product Pages -->
                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarShopCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarShopCollapse">
                                                    Single Product Pages
                                                </a>

                                                <div id="headerSidebarShopCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                    <ul id="headerSidebarShopMenu" class="u-header-collapse__nav-list">
                                                        <!-- Single Product Extended -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/single-product-extended.html">Single Product Extended</a></li>
                                                        <!-- End Single Product Extended -->

                                                        <!-- Single Product Fullwidth -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/single-product-fullwidth.html">Single Product Fullwidth</a></li>
                                                        <!-- End Single Product Fullwidth -->

                                                        <!-- Single Product Sidebar -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/single-product-sidebar.html">Single Product Sidebar</a></li>
                                                        <!-- End Single Product Sidebar -->
                                                    </ul>
                                                </div>
                                            </li>
                                            <!-- End Single Product Pages -->

                                            <!-- Ecommerce Pages -->
                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarDemosCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarDemosCollapse">
                                                    Ecommerce Pages
                                                </a>

                                                <div id="headerSidebarDemosCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                    <ul id="headerSidebarDemosMenu" class="u-header-collapse__nav-list">
                                                        <!-- Shop -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop.html">Shop</a></li>
                                                        <!-- End Shop -->

                                                        <!-- Cart -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/cart.html">Cart</a></li>
                                                        <!-- End Cart -->

                                                        <!-- Checkout -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/checkout.html">Checkout</a></li>
                                                        <!-- End Checkout -->

                                                        <!-- My Account -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/my-account.html">My Account</a></li>
                                                        <!-- End My Account -->

                                                        <!-- Track your Order -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/track-your-order.html">Track your Order</a></li>
                                                        <!-- End Track your Order -->

                                                        <!-- Compare -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/compare.html">Compare</a></li>
                                                        <!-- End Compare -->

                                                        <!-- wishlist -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/wishlist.html">wishlist</a></li>
                                                        <!-- End wishlist -->
                                                    </ul>
                                                </div>
                                            </li>
                                            <!-- End Ecommerce Pages -->

                                            <!-- Shop Columns -->
                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebardocsCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebardocsCollapse">
                                                    Shop Columns
                                                </a>

                                                <div id="headerSidebardocsCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                    <ul id="headerSidebardocsMenu" class="u-header-collapse__nav-list">
                                                        <!-- 7 Column Full width -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-7-columns-full-width.html">7 Column Full width</a></li>
                                                        <!-- End 7 Column Full width -->

                                                        <!-- 6 Column Full width -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-6-columns-full-width.html">6 Column Full width</a></li>
                                                        <!-- End 6 Column Full width -->

                                                        <!-- 5 Column Sidebar -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-5-columns-sidebar.html">5 Column Sidebar</a></li>
                                                        <!-- End 5 Column Sidebar -->

                                                        <!-- 4 Column Sidebar -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-4-columns-sidebar.html">4 Column Sidebar</a></li>
                                                        <!-- End 4 Column Sidebar -->

                                                        <!-- 3 Column Sidebar -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../shop/shop-3-columns-sidebar.html">3 Column Sidebar</a></li>
                                                        <!-- End 3 Column Sidebar -->
                                                    </ul>
                                                </div>
                                            </li>
                                            <!-- End Shop Columns -->

                                            <!-- Blog Pages -->
                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarblogsCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarblogsCollapse">
                                                    Blog Pages
                                                </a>

                                                <div id="headerSidebarblogsCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                    <ul id="headerSidebarblogsMenu" class="u-header-collapse__nav-list">
                                                        <!-- Blog v1 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../blog/blog-v1.html">Blog v1</a></li>
                                                        <!-- End Blog v1 -->

                                                        <!-- Blog v2 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../blog/blog-v2.html">Blog v2</a></li>
                                                        <!-- End Blog v2 -->

                                                        <!-- Blog v3 -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../blog/blog-v3.html">Blog v3</a></li>
                                                        <!-- End Blog v3 -->

                                                        <!-- Blog Full Width -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../blog/blog-full-width.html">Blog Full Width</a></li>
                                                        <!-- End Blog Full Width -->

                                                        <!-- Single Blog Post -->
                                                        <li><a class="u-header-collapse__submenu-nav-link" href="../blog/single-blog-post.html">Single Blog Post</a></li>
                                                        <!-- End Single Blog Post -->
                                                    </ul>
                                                </div>
                                            </li>
                                            <!-- End Blog Pages -->
                                        </ul>
                                        <!-- End List -->
                                    </div>
                                </div>
                                <!-- End Content -->
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- ========== END HEADER SIDEBAR ========== -->
            </div>
            <!-- End Logo-offcanvas-menu -->
            <!-- Primary Menu -->
            <div class="col d-none d-xl-block">
                <!-- Nav -->
                <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                    <!-- Navigation -->
                    <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                        <ul class="navbar-nav u-header__navbar-nav">
                            <!-- Home -->
                            <li class="nav-item u-header__nav-item">
                                <a class="nav-link u-header__nav-link" href="{{url('/')}}">Home</a>
                            </li>
                            <!-- End Home -->

                            <!-- About us -->
                            <li class="nav-item u-header__nav-item">
                                <a class="nav-link u-header__nav-link" href="../home/about.html">About us</a>
                            </li>
                            <!-- End About us -->

                            <!-- FAQs -->
                            <li class="nav-item u-header__nav-item">
                                <a class="nav-link u-header__nav-link" href="../home/faq.html">FAQs</a>
                            </li>
                            <!-- End FAQs -->

                            <!-- Contact Us -->
                            <li class="nav-item u-header__nav-item">
                                <a class="nav-link u-header__nav-link" href="../home/contact-v1.html">Contact Us</a>
                            </li>
                            <!-- End Contact Us -->
                        </ul>
                    </div>
                    <!-- End Navigation -->
                </nav>
                <!-- End Nav -->
            </div>
            <!-- End Primary Menu -->

            <!-- Header Icons -->
            <div class="d-xl-none col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                <div class="d-inline-flex">
                    <ul class="d-flex list-unstyled mb-0 align-items-center">
                        <!-- Search -->
                        <li class="col d-xl-none px-2 px-sm-3 position-static">
                            <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button" data-toggle="tooltip" data-placement="top" title="Search" aria-controls="searchClassic" aria-haspopup="true" aria-expanded="false" data-unfold-target="#searchClassic" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                <span class="ec ec-search"></span>
                            </a>

                            <!-- Input -->
                            <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2" aria-labelledby="searchClassicInvoker">
                                <form class="js-focus-state input-group px-3">
                                    <input class="form-control" type="search" placeholder="Search Product" >
                                    <div class="input-group-append">
                                        <button class="btn btn-primary px-3" type="button"><i class="font-size-18 ec ec-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!-- End Input -->
                        </li>
                        <!-- End Search -->

                        <li class="col d-none d-xl-block"><a href="../shop/compare.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Compare"><i class="font-size-22 ec ec-compare"></i></a></li>
                        <li class="col d-none d-xl-block"><a href="../shop/wishlist.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Favorites"><i class="font-size-22 ec ec-favorites"></i></a></li>
                        <li class="col d-xl-none px-2 px-sm-3"><a href="../shop/my-account.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="My Account"><i class="font-size-22 ec ec-user"></i></a></li>
                        <li class="col pr-xl-0 px-2 px-sm-3">
                            <a href="../shop/cart.html" class="text-gray-90 position-relative d-flex " data-toggle="tooltip" data-placement="top" title="Cart">
                                <i class="font-size-22 ec ec-shopping-bag"></i>
                                <span class="width-22 height-22 bg-dark position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 text-white">2</span>
                                <span class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">$1785.00</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Header Icons -->
        </div>
    </div>
</div>