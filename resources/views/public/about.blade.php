@extends('public.layouts.app')

@section('title', 'About Us')

@section('content')

    <!-- start breadcrumb area -->
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">About Us</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb area -->

    <!-- rts about us section start -->
    <div class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="about-image-v-inner">
                        <div class="image-area">
                            <img class="mt--110 img-1" src="{{ asset('') }}public/assets/images/about/main/about-03.jpg"
                                alt="BUsiness_image">
                            <img class="img-over" src="{{ asset('') }}public/assets/images/about/main/about-04.jpg"
                                alt="BUsiness_image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-progress-inner">
                        <div class="title-area">
                            <span>JUST A CONSULTANCY</span>
                            <h2 class="title">Finance Consulting for Challenging Times</h2>
                        </div>
                        <!-- inner start -->
                        <div class="inner">
                            <p class="disc">Testseva is a financial market research group. We generate intraday as
                                well as delivery calls in Stock cash and F&O in NSE & BSE, Commodities including bullions,
                                metals & commodities traded in MCX and NCDEX. Our calling facility is a very effective
                                system which ensures the instant message delivery without any loss of time, so the clients
                                get sufficient time to execute their trades in order to fetch maximum Profits.</p>
                            <p class="disc">
                                To ensure effective solutions for our customers, our experienced team has conceptualized and
                                deployed technological tools that have been custom-built to analyze markets incisively and
                                holistically.
                            </p>
                        </div>
                        <!-- end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts about us section end -->

    <!-- rts services area start -->
    <div class="rts-service-area rts-section-gapBottom">
        <div class="container-fluid service-main about-service-width-controler">
            <div class="background-service service-three row">
                <div class="row">
                    <div class="rts-title-area service-four text-center pt--40 pt_md--0 mt_sm--0 mt_md--0">
                        <p class="pre-title">
                            Our Values
                        </p>
                        {{-- <h2 class="title">What We Provide</h2> --}}
                    </div>
                    <!-- start single Service -->
                    <div class="d-flex gap-5 mt--50">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <h4>Our Vision</h4>
                            <p>Our vision is to provide our clients with wide-ranging, secured and finest financial reports
                                to
                                achieve sustained growth. We aim to do this by being responsive towards our clients and
                                strive relentlessly to improve. We at Testseva want to be worthy of our customer’s trust
                                and
                                provide them with the finest Stock and Commodity market recommendation.</p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <h4>Our Mission</h4>
                            <p>
                                We Endeavour to be valued as leader in client satisfaction & profitability. We work hard
                                continuously to enhance our reputation for accessibility, professionalism, analysis & depth
                                and
                                quality of our long term consultative relationship with clients.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cta-one-bg col-12">
                    <div class="cta-one-inner">
                        <div class="cta-left">
                            <h3 class="title animated fadeIn">Let’s discuss about how we can help
                                make your business better</h3>
                        </div>
                        <div class="cta-right">
                            <a class="rts-btn btn-white" href="/contact">Lets Work Togather</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts services area End -->
@endsection
