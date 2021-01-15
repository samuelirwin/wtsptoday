<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>WTSPToday | #1 Super Simple Custom-Branded Sharing Link</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" >
        <!-- Icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('fonts/line-icons.css') }}">
        <!-- Slicknav -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slicknav.css') }}">
        <!-- Owl carousel -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.css') }}">
        <!-- Slick Slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}" >
        <!-- Animate -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    </head>
    <body>
        <!-- Header Area wrapper Starts -->
        <header id="header-wrap">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="icon-menu"></span>
                        <span class="icon-menu"></span>
                        <span class="icon-menu"></span>
                        </button>
                        <a href="index.html" class="navbar-brand"><img src="img/logo.png" alt=""></a>
                    </div>
                    <div class="collapse navbar-collapse" id="main-navbar">
                        <ul class="navbar-nav mr-auto w-100 justify-content-left clearfix">
                            <li class="nav-item active">
                                <a class="nav-link" href="#hero-area">
                                Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#feature">
                                Features
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#testimonial">
                                Testimonial
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pricing">
                                Pricing
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right w-50">
						@if (Route::has('login'))                    
							@auth
							<li class="nav-item mr-2">
								<a class="nav-link" href="{{ url('/home') }}">Home</a>
							</li>
							@else
							<li class="nav-item mr-2">
								<a class="nav-link btn btn-outline" href="{{ route('login') }}">Login</a>
							</li>
								@if (Route::has('register'))
								<li class="nav-item mr-2">
									<a class="nav-link btn btn-border" href="{{ route('register') }}">Register</a>
								</li>
								@endif
							@endauth                    
						@endif
                        </ul>
                        
                    </div>
                </div>
                </div>
                <!-- Mobile Menu Start -->
                <ul class="mobile-menu navbar-nav">
                    <li>
                        <a class="page-scroll" href="#hero-area">
                        Home
                        </a>
                    <li>
                        <a class="page-scroll" href="#feature">
                        feature
                        </a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#testimonial">
                        Testimonial
                        </a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#pricing">
                        Pricing
                        </a>
                    </li>
                </ul>
                <!-- Mobile Menu End -->
            </nav>
            <!-- Navbar End -->
            <!-- Hero Area Start -->
            <div id="hero-area" class="hero-area-bg">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="contents text-center">
                                <h2 class="head-title wow fadeInUp">#1 Super Simple Custom-Branded Sharing Link</h2>
                                <div class="header-button wow fadeInUp" data-wow-delay="0.3s">
                                    <a href="{{ route('user.link.create') }}" class="btn btn-common">Create A Link</a>
                                </div>
                            </div>
                            <div class="img-thumb text-center wow fadeInUp" data-wow-delay="0.6s">
                                <img class="img-fluid" src="img/hero-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Area End -->
        </header>
        <!-- Header Area wrapper End -->
        <!-- Services Section Start -->
        <section id="feature" class="section-padding" style="background-color: #FFFFFF">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">The Features</h2>
                </div>
                <div class="row">
                    <!-- Services item -->
                    <div class="col-md-6 col-lg-4 col-xs-12">
                        <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
                            <div class="icon">
                                <i class="lni-cog"></i>
                            </div>
                            <div class="services-content">
                                <h3><a href="#">Web Development</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde perspiciatis dicta labore nulla beatae quaerat quia incidunt laborum aspernatur...</p>
                            </div>
                        </div>
                    </div>
                    <!-- Services item -->
                    <div class="col-md-6 col-lg-4 col-xs-12">
                        <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
                            <div class="icon">
                                <i class="lni-bar-chart"></i>
                            </div>
                            <div class="services-content">
                                <h3><a href="#">Graphic Design</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde perspiciatis dicta labore nulla beatae quaerat quia incidunt laborum aspernatur...</p>
                            </div>
                        </div>
                    </div>
                    <!-- Services item -->
                    <div class="col-md-6 col-lg-4 col-xs-12">
                        <div class="services-item wow fadeInRight" data-wow-delay="0.9s">
                            <div class="icon">
                                <i class="lni-briefcase"></i>
                            </div>
                            <div class="services-content">
                                <h3><a href="#">Business Branding</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde perspiciatis dicta labore nulla beatae quaerat quia incidunt laborum aspernatur...</p>
                            </div>
                        </div>
                    </div>
                    <!-- Services item -->
                    <div class="col-md-6 col-lg-4 col-xs-12">
                        <div class="services-item wow fadeInRight" data-wow-delay="1.2s">
                            <div class="icon">
                                <i class="lni-pencil-alt"></i>
                            </div>
                            <div class="services-content">
                                <h3><a href="#">Content Writing</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde perspiciatis dicta labore nulla beatae quaerat quia incidunt laborum aspernatur...</p>
                            </div>
                        </div>
                    </div>
                    <!-- Services item -->
                    <div class="col-md-6 col-lg-4 col-xs-12">
                        <div class="services-item wow fadeInRight" data-wow-delay="1.5s">
                            <div class="icon">
                                <i class="lni-mobile"></i>
                            </div>
                            <div class="services-content">
                                <h3><a href="#">App Development</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde perspiciatis dicta labore nulla beatae quaerat quia incidunt laborum aspernatur...</p>
                            </div>
                        </div>
                    </div>
                    <!-- Services item -->
                    <div class="col-md-6 col-lg-4 col-xs-12">
                        <div class="services-item wow fadeInRight" data-wow-delay="1.8s">
                            <div class="icon">
                                <i class="lni-layers"></i>
                            </div>
                            <div class="services-content">
                                <h3><a href="#">Digital Marketing</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde perspiciatis dicta labore nulla beatae quaerat quia incidunt laborum aspernatur...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Section End -->
        <!-- Clients Section Start -->
        <!-- <div id="clients" class="section-padding">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">As Seen On</h2>
                </div>
                <div class="row text-align-">
                    <div class="col-lg-3 col-md-3 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="client-item-wrapper">
                            <img class="img-fluid" src="img/clients/img1.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="client-item-wrapper">
                            <img class="img-fluid" src="img/clients/img2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12 wow fadeInUp" data-wow-delay="0.9s">
                        <div class="client-item-wrapper">
                            <img class="img-fluid" src="img/clients/img3.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12 wow fadeInUp" data-wow-delay="1.2s">
                        <div class="client-item-wrapper">
                            <img class="img-fluid"  src="img/clients/img4.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Clients Section End -->
        <!-- Testimonial Section Start -->
        <section id="testimonial" class="testimonial section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div id="testimonials" class="owl-carousel wow fadeInUp" data-wow-delay="1.2s">
                            <div class="item">
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">Holisticly empower leveraged ROI whereas effective web-readiness. Completely enable emerging meta-services with cross-platform web services. Quickly initiate inexpensive total linkage rather than extensible scenarios. Holisticly empower leveraged ROI whereas effective web-readiness. </p>
                                    </div>
                                    <div class="img-thumb">
                                        <img src="img/testimonial/img1.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <h2><a href="#">Grenchen Pearce</a></h2>
                                        <h3><a href="#">Boston Brothers co.</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">Holisticly empower leveraged ROI whereas effective web-readiness. Completely enable emerging meta-services with cross-platform web services. Quickly initiate inexpensive total linkage rather than extensible scenarios. Holisticly empower leveraged ROI whereas effective web-readiness. </p>
                                    </div>
                                    <div class="img-thumb">
                                        <img src="img/testimonial/img2.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <h2><a href="#">Domeni GEsson</a></h2>
                                        <h3><a href="#">Awesome Technology co.</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">Holisticly empower leveraged ROI whereas effective web-readiness. Completely enable emerging meta-services with cross-platform web services. Quickly initiate inexpensive total linkage rather than extensible scenarios. Holisticly empower leveraged ROI whereas effective web-readiness. </p>
                                    </div>
                                    <div class="img-thumb">
                                        <img src="img/testimonial/img3.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <h2><a href="#">Dommini Albert</a></h2>
                                        <h3><a href="#">Nesnal Design co.</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">Holisticly empower leveraged ROI whereas effective web-readiness. Completely enable emerging meta-services with cross-platform web services. Quickly initiate inexpensive total linkage rather than extensible scenarios. Holisticly empower leveraged ROI whereas effective web-readiness. </p>
                                    </div>
                                    <div class="img-thumb">
                                        <img src="img/testimonial/img4.png" alt="">
                                    </div>
                                    <div class="info">
                                        <h2><a href="#">Fernanda Anaya</a></h2>
                                        <h3><a href="#">Developer</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">Holisticly empower leveraged ROI whereas effective web-readiness. Completely enable emerging meta-services with cross-platform web services. Quickly initiate inexpensive total linkage rather than extensible scenarios. Holisticly empower leveraged ROI whereas effective web-readiness. </p>
                                    </div>
                                    <div class="img-thumb">
                                        <img src="img/testimonial/img5.png" alt="">
                                    </div>
                                    <div class="info">
                                        <h2><a href="#">Jason A.</a></h2>
                                        <h3><a href="#">Designer</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial Section End -->  
        <!-- Pricing section Start --> 
        <section id="pricing" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="table wow fadeInLeft" data-wow-delay="1.2s">
                            <div class="title">
                                <h3>Basic</h3>
                            </div>
                            <div class="pricing-header">
                                <p class="price-value">$12.90<span>/ Month</span></p>
                            </div>
                            <ul class="description">
                                <li>Up to 5 projects </li>
                                <li>Up to 10 collabrators</li>
                                <li>2gb of storage</li>
                            </ul>
                            <button class="btn btn-common">Get It</button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12 active">
                        <div class="table wow fadeInUp" id="active-tb" data-wow-delay="1.2s">
                            <div class="title">
                                <h3>Profesional</h3>
                            </div>
                            <div class="pricing-header">
                                <p class="price-value">$49.90<span>/ Month</span></p>
                            </div>
                            <ul class="description">
                                <li>Up to 10 projects</li>
                                <li>Up to 20 collabrators</li>
                                <li>10gb of storage</li>
                                <li>Real-time collabration</li>
                            </ul>
                            <button class="btn btn-common">Get It</button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="table wow fadeInRight" data-wow-delay="1.2s">
                            <div class="title">
                                <h3>Expert</h3>
                            </div>
                            <div class="pricing-header">
                                <p class="price-value">$89.90<span>/ Month</span></p>
                            </div>
                            <ul class="description">
                                <li>unlimited projects </li>
                                <li>Unlimited collabrators</li>
                                <li>Unlimited of storage</li>
                                <li>Real-time collabration</li>
                                <li>24x7 Support</li>
                            </ul>
                            <button class="btn btn-common">Get It</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Table Section End --> 
        <!-- Subscribe Section Start -->
        <section id="Subscribes" class="subscribes section-padding">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-10 col-lg-8">
                        <h4 class="wow fadeInUp" data-wow-delay="0.3s">Create Links For Free</h4>
                        <p class="wow fadeInUp" data-wow-delay="0.6s">You will be able to create 5 custom links for free.</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Subscribe Section End -->
        <!-- Footer Section Start -->
        <!-- <footer id="footer" class="footer-area section-padding">
            <div class="container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="footer-logo mb-3">
                                <img src="img/logo.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam excepturi quasi, ipsam voluptatem.</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
                            <h3 class="footer-titel">Company</h3>
                            <ul>
                                <li><a href="#">Press Releases</a></li>
                                <li><a href="#">Mission</a></li>
                                <li><a href="#">Strategy</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.6s">
                            <h3 class="footer-titel">About</h3>
                            <ul>
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">Clients</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.8s">
                            <h3 class="footer-titel">Find us on</h3>
                            <div class="social-icon">
                                <a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
                                <a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
                                <a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
                                <a class="linkedin" href="#"><i class="lni-linkedin-filled"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer> -->
        <!-- Footer Section End -->
        <section id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>WTSPToday | Copyright © {{ date('Y') }} UIdeck All Right Reserved</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Go to Top Link -->
        <a href="#" class="back-to-top">
        <i class="lni-arrow-up"></i>
        </a>
        <!-- Preloader -->
        <div id="preloader">
            <div class="loader" id="loader-1"></div>
        </div>
        <!-- End Preloader -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/jquery-min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/slick.min.js') }}"></script>
        <script src="{{ asset('js/wow.js') }}"></script>
        <script src="{{ asset('js/jquery.nav.js') }}"></script>
        <script src="{{ asset('js/scrolling-nav.js') }}"></script>
        <script src="{{ asset('/js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>