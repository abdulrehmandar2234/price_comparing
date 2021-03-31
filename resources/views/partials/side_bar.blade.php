<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{url('/')}}" class="sidebar-brand">
            Price<span>Comparing</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">

        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ url('/home') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Manage</li>
            <li class="nav-item">

                <a href="{{ url('/roles') }}" class="nav-link">
                    <i class="link-icon" data-feather="shield"></i>
                    <span class="link-title">Roles</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/permissions') }}" class="nav-link">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Permissions</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/users') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/websites') }}" class="nav-link">
                    <i class="link-icon" data-feather="layout"></i>
                    <span class="link-title">Websites</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ url('/products') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Product</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ url('/categories') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-plus"></i>
                    <span class="link-title">Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('category_links.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-plus"></i>
                    <span class="link-title">Category Link</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('category_nodes.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-plus"></i>
                    <span class="link-title">Category Node</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('scraped_categories.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-plus"></i>
                    <span class="link-title">Scraped Category</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ url('/brands') }}" class="nav-link">
                    <i class="link-icon" data-feather="bookmark"></i>
                    <span class="link-title">Brand</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a href="{{ url('/product_links') }}" class="nav-link">
                    <i class="link-icon" data-feather="link-2"></i>
                    <span class="link-title">Product Link</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ url('/slider') }}" class="nav-link">
                    <i class="link-icon" data-feather="maximize"></i>
                    <span class="link-title">Slider</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ url('/search-websites') }}" class="nav-link">
                    <i class="link-icon" data-feather="search"></i>
                    <span class="link-title">Website Searches</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a href="{{ url('/single-product') }}" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="link-title">Single Product</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ route('blog.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Recipe </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('recipecategory.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="file"></i>
                    <span class="link-title">Recipe Category </span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('advertisement.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="tablet"></i>
                    <span class="link-title">Advertisement</span>
                </a>
            </li>
        </ul>
    </div>
</nav>