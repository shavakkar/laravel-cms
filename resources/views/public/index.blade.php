@extends('public.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="search-input-area mt--30">
        <div id="close" class="search-close-icon mr--10 mt--10"><i class="far fa-times"></i></div>
        <div class="container" style="height: 100%">
            <div>
                <h4 class="text-center">Important Note</h4>
            </div>
            <ul class="pl-0 list-none !mb-0 text-left fs-sm leading-[1.9]">
                <li class="relative flex">
                    <span class="pr-[.75rem] mt-1">
                        <i
                            class="me-3 text-danger uil uil-check w-4 h-4 text-[0.8rem] leading-none tracking-[normal] !text-center flex justify-center items-center !bg-[#def4ee] rounded-[100%] top-[0.2rem] before:content-['\e9dd'] before:align-middle before:table-cell"></i>
                    </span>
                    <span>SEBI
                        Registration Number: <b>INH200000000</b>.</span>
                </li>
                <li class="relative mt-[0.35rem] flex"><span class="pr-[.75rem] mt-1"><i
                            class="me-3 text-danger uil uil-check w-4 h-4 text-[0.8rem] leading-none tracking-[normal] !text-center flex justify-center items-center !bg-[#def4ee] rounded-[100%] top-[0.2rem] before:content-['\e9dd'] before:align-middle before:table-cell"></i></span><span>Our
                        Official website is www.Testseva.com, E-Mail Id:
                        <b>{{ $settings->email }}</b>;
                        Our Official Support Contact No.: <b>+91 {{ $settings->mobile }}</b>
                    </span></li>
                <li class="relative mt-[0.35rem] flex"><span class="pr-[.75rem] mt-1"><i
                            class="me-3 text-danger uil uil-check w-4 h-4 text-[0.8rem] leading-none tracking-[normal] !text-center flex justify-center items-center !bg-[#def4ee] rounded-[100%] top-[0.2rem] before:content-['\e9dd'] before:align-middle before:table-cell"></i></span><span>We
                        Do Not Offer Any Assured / Guaranteed / Profit Sharing/ Demat Account Or Broking
                        Services
                        / Portfolio Management Services. Clients are never asked for their Banking Or
                        Broking
                        Credentials at Testseva.</span></li>

                <li class="relative mt-[0.35rem] flex"><span class="pr-[.75rem] mt-1"><i
                            class="me-3 text-danger uil uil-check w-4 h-4 text-[0.8rem] leading-none tracking-[normal] !text-center flex justify-center items-center !bg-[#def4ee] rounded-[100%] top-[0.2rem] before:content-['\e9dd'] before:align-middle before:table-cell"></i></span><span>Do
                        Not Share Your Credit Card / Debit Card / Netbanking Credentials /
                        Demat Account Credentials With Any Of Our Employee. If you are being asked then inform
                        us on <b>+91 {{ $settings->mobile }}</b> or E-Mail us at <b>{{ $settings->email }}</b>
                    </span></li>

                <li class="relative mt-[0.35rem] flex"><span class="pr-[.75rem] mt-1"><i
                            class="me-3 text-danger uil uil-check w-4 h-4 text-[0.8rem] leading-none tracking-[normal] !text-center flex justify-center items-center !bg-[#def4ee] rounded-[100%] top-[0.2rem] before:content-['\e9dd'] before:align-middle before:table-cell"></i></span><span>We
                        accept payments only in registered BANK ACCOUNT. Please check on “Payment” in our
                        website
                        to get our Bank Details.</span></li>

                <li class="relative mt-[0.35rem] flex"><span class="pr-[.75rem] mt-1"><i
                            class="me-3 text-danger uil uil-check w-4 h-4 text-[0.8rem] leading-none tracking-[normal] !text-center flex justify-center items-center !bg-[#def4ee] rounded-[100%] top-[0.2rem] before:content-['\e9dd'] before:align-middle before:table-cell"></i></span><span>Investing
                        In The Market Is Subject To Market Risk Hence Read All Our Disclaimer And T&C
                        Carefully Before Investing.</span></li>
            </ul>
        </div>
    </div>

    <!-- rts banner darea start -->
    <div class="rts-banner-area banner-bg-h7">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-7">
                    <!-- bannerq inner six -->
                    <div class="rts-banner-wrapper-seven">
                        <p class="pre-title"><span>Welcome!</span> Start Growing Your Business Today</p>
                        <h1 class="banner-title">
                            We Help to Grow <br>
                            Your <span>Financial Business </span>
                        </h1>
                        <p class="disc">
                            Unlock the potential of your investments and empower yourself to make informed decisions and
                            maximize your returns in today’s dynamic market.
                        </p>
                        <div class="button-area">
                            <a href="/services" class="rts-btn btn-primary six mr--30">Our Services</a>
                            <a href="/contact" class="rts-btn btn-primary deactive">Free Consultant</a>
                        </div>
                    </div>
                    <!-- bannerq inner six ENd -->
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="rts-contact-form-area six">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="rts-contact-fluid">
                                        <div class="rts-title-area contact-fluid text-center">
                                            <h2 class="title">Let’s Get in Touch</h2>
                                            <h6 name="resp"></h6>
                                        </div>
                                        <div class="form-wrapper">
                                            <div id="form-messages"></div>
                                            <form class="homeContact" action="{{ route('public.contact.store') }}"
                                                method="post">
                                                @csrf
                                                <input type="text" id="name" name="name" placeholder="Full Name">
                                                <input type="email" id="email" name="email"
                                                    placeholder="Your Email">
                                                <input type="text" id="mobile" name="mobile"
                                                    placeholder="Mobile Number">
                                                {{-- <textarea placeholder="Type Your Message" id="message" name="message"></textarea> --}}
                                                <button type="submit" class="rts-btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-banner-6">
            <img src="{{ asset('') }}public/assets/images/banner/shape/shape-h6.png" alt="shape-images"
                data-sal-delay="150" data-sal="slide-right" data-sal-duration="800">
        </div>
    </div>
    <!-- rts banner darea end -->

    <!-- rts-service area start -->
    <div class="rts-service-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="pre-title">
                            Our Services
                        </p>
                        <h2 class="title">Effective Services</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--10">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <!-- single service for home six -->
                    <div class="single-service-home-six">
                        <div class="icon">
                            <img src="{{ asset('') }}public/assets/images/service/icon/19.svg" alt="">
                        </div>
                        <div class="inner">
                            <h5 class="title">
                                Financial planning
                            </h5>
                            <p class="disc">
                                Incorporating strategic stock trading into your financial planning helps you build a
                                diversified portfolio.
                            </p>
                            {{-- <a href="#" class="rts-btn btn-primary">
                                Read More
                            </a> --}}
                        </div>
                    </div>
                    <!-- single service for home six End -->
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <!-- single service for home six -->
                    <div class="single-service-home-six">
                        <div class="icon">
                            <img src="{{ asset('') }}public/assets/images/service/icon/20.svg" alt="">
                        </div>
                        <div class="inner">
                            <h5 class="title">
                                Managment planning
                            </h5>
                            <p class="disc">
                                Integrating stock trading into your management planning enables you to optimize resource
                                allocation.
                            </p>
                            {{-- <a href="#" class="rts-btn btn-primary">
                                Read More
                            </a> --}}
                        </div>
                    </div>
                    <!-- single service for home six End -->
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <!-- single service for home six -->
                    <div class="single-service-home-six">
                        <div class="icon">
                            <img src="{{ asset('') }}public/assets/images/service/icon/26.svg" alt="">
                        </div>
                        <div class="inner">
                            <h5 class="title">
                                Social planning
                            </h5>
                            <p class="disc">
                                Effective stock trading strategies can play a crucial role in social planning by creating
                                opportunities for community investment.
                            </p>
                            {{-- <a href="#" class="rts-btn btn-primary">
                                Read More
                            </a> --}}
                        </div>
                    </div>
                    <!-- single service for home six End -->
                </div>
            </div>
        </div>
    </div>
    <!-- rts-service area end -->

    <!-- rts cta area start -->
    <div class="rts-callto-acation-area rts-callto-acation-area4 bg-call-to-action-two">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-two-wrapper">
                        <div class="title-area">
                            <h3 class="title animated fadeIn">Let’s discuss about how we can help <br>
                                make your investment better</h3>
                        </div>
                        <a class="rts-btn btn-primary-5 six" href="/contact">Lets Work Together</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts cta area start end -->

    <!-- rts about area start -->
    <div class="rts-about-area rts-section-gap about-home-seven">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="thumbnail">
                        <img src="{{ asset('') }}public/assets/images/about/main/06.jpg" alt="about_image">
                        <img src="{{ asset('') }}public/assets/images/about/main/about-02-sm.jpg" alt="small"
                            class="small">
                        <div class="experience-area six">
                            <h2 class="title">
                                25
                            </h2>
                            <span>
                                Years Of Experience
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt--10">
                    <div class="text-start home-seven-about">
                        <p class="pre-title">
                            More About Testseva
                        </p>
                        <h3 class="title">Our Consulting For All Kind Of Finance Services</h3>
                    </div>
                    <div class="inner-about-home-7">
                        <p class="disc">
                            Enhance financial flexibility, and drive strategic growth through well-informed investment
                            decisions. Manage risk, and achieve your long-term investment goals with precision and
                            confidence. funding social initiatives, and fostering economic growth within local and global
                            networks.
                        </p>
                        <!-- ingle about start -->
                        <div class="about-single-home-7">
                            <div class="icon">
                                <img src="{{ asset('') }}public/assets/images/about/main/icon/01.svg" alt="">
                            </div>
                            <div class="discription">
                                <h6 class="title">
                                    Global Insights
                                </h6>
                                <p class="disc">
                                    Leveraging stock trading insights provides a global perspective on market trends,
                                    enabling you to navigate international opportunities.
                                </p>
                            </div>
                        </div>
                        <!-- ingle about end -->
                        <!-- ingle about start -->
                        <div class="about-single-home-7">
                            <div class="icon">
                                <img src="{{ asset('') }}public/assets/images/about/main/icon/02.svg" alt="">
                            </div>
                            <div class="discription">
                                <h6 class="title">
                                    Business Investment
                                </h6>
                                <p class="disc">
                                    Strategic stock trading is a key component of business investment, offering the
                                    potential for significant capital growth.
                                </p>
                            </div>
                        </div>
                        <!-- ingle about end -->
                        <!-- ingle about start -->
                        <div class="about-single-home-7">
                            <div class="icon">
                                <img src="{{ asset('') }}public/assets/images/about/main/icon/03.svg" alt="">
                            </div>
                            <div class="discription">
                                <h6 class="title">
                                    Yearly Calculation
                                </h6>
                                <p class="disc">
                                    Integrating stock trading into your yearly calculations helps track performance and
                                    assess investment returns.
                                </p>
                            </div>
                        </div>
                        <!-- ingle about end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts about area end -->

    <!-- rts customer feedback area start -->
    <div class="rts-customer-feedback-area-six rts-section-gap bg-feedback-seven">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-area text-center">
                        <p class="pre-title">
                            Our Testimonials
                        </p>
                        <h2 class="title">
                            Our Customer Feedbacks
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row mt--40">
                <div class="swiper mySwiperh2_clients">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <!-- single client reviews -->
                            <div class="rts-client-reviews-h2 six">
                                <div class="review-header">
                                    <a href="#" class="thumbnail">
                                        <img src="{{ asset('') }}public/assets/images/testimonials/02.png"
                                            alt="testimonials_area">
                                    </a>
                                    <div class="discription">
                                        <a href="#">
                                            <h6 class="title">David Smith</h6>
                                        </a>
                                        <span>Finance</span>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <p class="disc">
                                        “This has transformed the way I trade. The features and real-time insights
                                        gave me a significant edge in the market. I particularly enjoy the detailed
                                        analysis tools and the ability to customize my trading strategies.”
                                    </p>
                                    <div class="body-end">
                                        <a href="#"><img
                                                src="{{ asset('') }}public/assets/images/testimonials/icon/logo-01.png"
                                                alt="Client_logo"></a>
                                        <div class="star-icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single client reviews End -->
                        </div>
                        <div class="swiper-slide">
                            <!-- single client reviews -->
                            <div class="rts-client-reviews-h2 six">
                                <div class="review-header">
                                    <a href="#" class="thumbnail">
                                        <img src="{{ asset('') }}public/assets/images/testimonials/03.png"
                                            alt="testimonials_area">
                                    </a>
                                    <div class="discription">
                                        <a href="#">
                                            <h6 class="title">Mark Jone</h6>
                                        </a>
                                        <span>Finance</span>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <p class="disc">
                                        “I started using this service a few months ago, and I’m genuinely impressed. As a
                                        beginner, I found the educational materials and tutorials incredibly helpful. It is
                                        intuitive, made it easy to get started.”
                                    </p>
                                    <div class="body-end">
                                        <a href="#"><img
                                                src="{{ asset('') }}public/assets/images/testimonials/icon/logo-02.png"
                                                alt="Client_logo"></a>
                                        <div class="star-icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single client reviews End -->
                        </div>
                        <div class="swiper-slide">
                            <!-- single client reviews -->
                            <div class="rts-client-reviews-h2 six">
                                <div class="review-header">
                                    <a href="#" class="thumbnail">
                                        <img src="{{ asset('') }}public/assets/images/testimonials/04.png"
                                            alt="testimonials_area">
                                    </a>
                                    <div class="discription">
                                        <a href="#">
                                            <h6 class="title">Lord Korn</h6>
                                        </a>
                                        <span>Finance</span>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <p class="disc">
                                        “The trading experience is fantastic! The features offered are robust and the
                                        platform is very user-friendly. I especially love the customizable dashboards and
                                        real-time alerts that keep me informed of market movements.”
                                    </p>
                                    <div class="body-end">
                                        <a href="#"><img
                                                src="{{ asset('') }}public/assets/images/testimonials/icon/logo-03.png"
                                                alt="Client_logo"></a>
                                        <div class="star-icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single client reviews End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts customer feedback area end -->

@endsection

@section('scripts')
    <script src="{{ asset('') }}public/assets/projects/home/index.js"></script>
@endsection
