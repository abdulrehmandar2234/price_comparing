<div class="d-none d-xl-block bg-primary">
            <div class="container">
                <div class="row align-items-stretch min-height-50">
                    <!-- Vertical Menu -->
                    <div class="col-md-auto d-none d-xl-flex align-items-end">
                        <div class="max-width-270 min-width-270">
                            <!-- Basics Accordion -->
                            <div id="basicsAccordion">
                                <!-- Card -->
                                <div class="card border-0 rounded-0">
                                    <div class="card-header bg-primary rounded-0 card-collapse border-0" id="basicsHeadingOne">
                                        <button type="button" class="btn-link btn-remove-focus btn-block d-flex card-btn py-3 text-lh-1 px-4 shadow-none btn-primary rounded-top-lg border-0 font-weight-bold text-gray-90"
                                            data-toggle="collapse"
                                            data-target="#basicsCollapseOne"
                                            aria-expanded="true"
                                            aria-controls="basicsCollapseOne">
                                            <span class="pl-1 text-gray-90">Categories</span>
                                            <span class="text-gray-90 ml-3">
                                                <span class="ec ec-arrow-down-search"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse vertical-menu v1"
                                        aria-labelledby="basicsHeadingOne"
                                        data-parent="#basicsAccordion">
                                        <div class="card-body p-0">
                                            <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized">
                                                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                                    <ul class="navbar-nav u-header__navbar-nav border-primary border-top-0">
                                                        <li class="nav-item u-header__nav-item"
                                                            data-event="hover"
                                                            data-position="left">
                                                            <a href="#" class="nav-link u-header__nav-link font-weight-bold">Value of the Day</a>
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
                    <!-- Search bar -->
                    <div class="col align-self-center">
                        <!-- Search-Form -->
                        <form method="GET" action="{{route('search')}}" class="js-focus-state">
                            <label class="sr-only" for="searchProduct">Search</label>
                            <div class="input-group">
                                <input type="text" class="form-control py-2 pl-5 font-size-15 border-0 height-40 rounded-left-pill" name="search" id="searchProduct" placeholder="Search for Products" aria-label="Search for Products" aria-describedby="searchProduct1" required>
                                <div class="input-group-append">
                                    <!-- Select -->
                                    <!-- End Select -->
                                    <button class="btn btn-dark height-40 py-2 px-3 rounded-right-pill" type="submit" id="searchProduct1">
                                        <span class="ec ec-search font-size-24"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- End Search-Form -->
                    </div>
                    <!-- End Search bar -->
                    <!-- Header Icons -->
                    <div class="col-md-auto align-self-center">
                        <div class="d-flex">
                            <ul class="d-flex list-unstyled mb-0">
                            <li class="col"><a href="{{url('my-account')}}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Sign-In"><i class="font-size-22 ec ec-user"></i></a></li>
                                <li class="col"><a href="../shop/compare.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Compare"><i class="font-size-22 ec ec-compare"></i></a></li>
                                <li class="col"><a href="{{url('wishlist')}}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Favorites"><i class="font-size-22 ec ec-favorites"></i></a></li>
                                <li class="col pr-0">
                                    <a href="../shop/cart.html" class="text-gray-90 position-relative d-flex " data-toggle="tooltip" data-placement="top" title="Cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 512 512" width="30" height="30"><path d="M496,264c0-28.567-7.026-54.255-20.635-76.293,12.222-11.572,28.241-34.564,13.439-67.8,5.825-14.409,9.276-40.137-12.366-54.565a8,8,0,1,0-8.876,13.312c8.275,5.517,10.095,13.862,9.63,21.309a24,24,0,1,0,.951,39.409c2.473,15.283-3.893,26.856-12.086,35.119A152.04,152.04,0,0,0,430.4,142.316C392.3,117.25,340.289,104,280,104c-49.018,0-96.057,9.376-133.639,26.524-12.154-28.315-39.521-34.114-40.792-34.369A8,8,0,0,0,96,104c0,4.15-4.271,14.642-7.155,20.422-7.537,15.075-6.961,31.323,1.5,46.335-5.139,6.54-8.531,13.013-10.108,19.3C74.291,213.853,58.64,222.173,54.48,224H40a24.027,24.027,0,0,0-24,24v16a24.027,24.027,0,0,0,24,24H53.227c26.329,20.266,52.5,21.314,70.034,18.518A98.339,98.339,0,0,0,144,300.791v90.226l-7.761,31.043A8,8,0,0,0,144,432h48a8,8,0,0,0,8-8V393.3l20.916-62.749A238.132,238.132,0,0,0,341.235,342.9a221.9,221.9,0,0,0,45.926-12.122l20.513,61.539-7.435,29.739A8,8,0,0,0,408,432h48a8,8,0,0,0,8-8V392.983L495.761,265.94A7.977,7.977,0,0,0,496,264ZM464,128a8,8,0,1,1,8-8A8.009,8.009,0,0,1,464,128ZM32,264V248a8.009,8.009,0,0,1,8-8h8v32H40A8.009,8.009,0,0,1,32,264ZM154.246,416l4-16H184v16Zm264,0,4-16H448v16Zm31.508-32H421.767L399.59,317.47a7.95,7.95,0,0,0-1.483-2.616l-.029-.035c-.144-.169-.294-.33-.451-.486-.052-.052-.105-.1-.158-.153-.128-.12-.258-.237-.394-.348-.1-.081-.2-.157-.3-.233s-.211-.157-.32-.23c-.149-.1-.3-.194-.461-.286-.072-.041-.142-.085-.215-.125-.057-.03-.11-.066-.168-.1C394.484,312.284,368,298.318,368,264a8,8,0,0,0-16,0c0,27.214,13.1,44.49,23.6,53.974a212.6,212.6,0,0,1-37.452,9.217,222.1,222.1,0,0,1-119.07-14.576,8,8,0,0,0-10.667,4.855L186.233,384H160V288a8.01,8.01,0,0,0-12.316-6.735C145.951,282.367,105.7,307.3,64,276.1V237.108c8.659-4.662,25.149-16.722,31.76-43.162,1.285-5.126,4.882-11.044,10.4-17.115a8,8,0,0,0,.622-9.985c-8.247-11.721-9.468-23.586-3.627-35.268a119.207,119.207,0,0,0,6.9-16.972,43.861,43.861,0,0,1,23.952,29.071,8,8,0,0,0,11.345,5.08C181.979,130.213,229.8,120,280,120c56.338,0,106.627,12.672,141.6,35.684C460.08,181,479.724,217.11,480,263.027Z"/><circle cx="104" cy="232" r="8"/></svg>
                                        <span class="width-22 height-22 bg-dark position-absolute flex-content-center text-white rounded-circle left-12 top-8 font-weight-bold font-size-12">2</span>
                                        <span class="font-weight-bold font-size-16 text-gray-90 ml-3">$1785.00</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Header Icons -->
                </div>
            </div>
        </div>