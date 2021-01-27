@extends('layouts.main')

@section('content')    
    
    <!--====== FEATURES PART START ======-->

    <section id="features" class="features-area pt-60 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-features text-center mt-40">
                        <div class="features-icon">
                            <i class="lni-school-compass"></i>
                            <img class="shape" src="assets/images/f-shape-1.svg" alt="Shape">
                        </div>
                        <div class="features-content">
                            <h4 class="features-title"><a href="#">Link Management</a></h4>
                            <p class="text">Manage your links easily from one place using a central dashboard!</p>
                            <div class="features-btn rounded-buttons">
                                <a class="main-btn rounded-one" href="#">KNOW MORE</a>
                            </div>
                        </div>
                    </div> <!-- single features -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-features text-center mt-40">
                        <div class="features-icon">
                            <i class="lni-construction"></i>
                            <img class="shape" src="assets/images/f-shape-1.svg" alt="Shape">
                        </div>
                        <div class="features-content">
                            <h4 class="features-title"><a href="#">Analytics</a></h4>
                            <p class="text">Get actionable insights from your links to grow your business!</p>
                            <div class="features-btn rounded-buttons">
                                <a class="main-btn rounded-one" href="#">KNOW MORE</a>
                            </div>
                        </div>
                    </div> <!-- single features -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-features text-center mt-40">
                        <div class="features-icon">
                            <i class="lni-cup"></i>
                            <img class="shape" src="assets/images/f-shape-1.svg" alt="Shape">
                        </div>
                        <div class="features-content">
                            <h4 class="features-title"><a href="#">Direct Communication</a></h4>
                            <p class="text">Close deals directly using the World's most popular communication app!</p>
                            <div class="features-btn rounded-buttons">
                                <a class="main-btn rounded-one" href="#">KNOW MORE</a>
                            </div>
                        </div>
                    </div> <!-- single features -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== FEATURES PART ENDS ======-->
        
    <!--====== PRICING START ======-->
    
    <section id="pricing" class="pricing-area pt-95 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h4 class="title">Our Pricing Plan</h4>
                        <p class="text">Reach closer to your customers promoting your business and close deals immediately.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            
            <div class="row justify-content-center">                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing mt-40">
                        <div class="pricing-baloon">
                            <img src="assets/images/baloon.svg" alt="baloon">
                        </div>
                        <div class="pricing-header">
                            <h5 class="sub-title">FREE</h5>
                            <span class="price">RM 0</span>
                            <p class="year">per lifetime</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Up to 7 links</li>
                                <li><i class="lni-check-mark-circle"></i> Basic analytics</li>                                
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-one" href="{{ route('admin.links.create') }}">GET STARTED</a>
                        </div>
                        <div class="bottom-shape">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-2{fill:#0067f4;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g><g data-name="Group 747"><path data-name="Path 294" class="cls-1 color-2" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path data-name="Path 297" class="cls-2 color-2" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path data-name="Path 296" class="cls-3 color-2" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path data-name="Path 295" class="cls-4 color-2" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> <!-- single pricing -->
                </div>     
                         
                
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PRICING ENDS ======-->

    <section class="call-action-area call-action-one pt-50 pb-100 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-action-content d-lg-flex justify-content-between align-items-center">
                        <div class="call-action-text mt-50">
                            <h2 class="action-title">Ready to create your branded WhatsApp link?</h2>
                            <p class="text">WTSPToday is here for you, create now and start closing deals immediately with your customers.</p>
                        </div>
                        <div class="call-action-btn mt-50 rounded-buttons">
                            <a href="{{ route('admin.links.create') }}" class="main-btn rounded-three">Get Started Now</a>
                        </div>
                    </div> 
                </div>
            </div> 
        </div> 
    </section>
    
@endsection