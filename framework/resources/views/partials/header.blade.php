    <!--====== HEADER ONE PART START ======-->

    <header class="header-area">

        <div class="navbar-area navbar-one navbar-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ url('/') }}" style="color:white">
                                {{ trans('panel.site_title') }}
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">Pricing</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav">
                                    @auth
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.products.index') }}">My Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        </li>
                                        <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                        </form>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endauth
                                </ul>
                            </div>

                            <div class="d-none d-sm-inline-block">
                                <ul class="navbar-nav">
                                    @auth
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.products.index') }}">My Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        </li>
                                        <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                        </form>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endauth
                                </ul>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

        <div id="home" class="header-content-area d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-wrapper">
                            <div class="header-content">
                                <h3 class="header-title">Branded WhatsApp Link, Loudest Noise</h3>
                                <p class="text">A branded custom WhatsApp link to help you grow your branding and presence.</p>
                                <div class="header-btn rounded-buttons">
                                    <a class="main-btn rounded-one" href="{{ route('admin.links.create') }}">Get Started For Free</a>
                                </div>
                                
                            </div> <!-- header content -->

                            <div class="header-image d-none d-lg-block">
                                <div class="image">
                                    <img src="assets/images/header.png" alt="Header">
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-shape">
                <img src="assets/images/header-shape.svg" alt="shape">
            </div> <!-- header-shape -->
        </div> <!-- header content area -->
    </header>

    <!--====== HEADER ONE PART ENDS ======-->