@extends('public.layouts.app')

@section('title', 'Contact Us')

@section('content')
    <!-- start breadcrumb area -->
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Contact Us</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb area -->


    <!-- contact single area start -->
    <div class="rts-contact-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <!-- single contact area -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="single-contact-one-inner">
                        <div class="thumbnail">
                            <img src="{{ asset('') }}public/assets/images/contact/01.png" alt="">
                        </div>
                        <div class="content">
                            <div class="icone">
                                <img src="{{ asset('') }}public/assets/images/contact/shape/01.svg" alt="">
                            </div>
                            <div class="info">
                                <span>Call Us 24/7</span>
                                <a href="tel:+91{{ $settings->mobile }}">
                                    <h6>+91 {{ $settings->mobile }}</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single contact area end -->
                <!-- single contact area -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="single-contact-one-inner">
                        <div class="thumbnail">
                            <img src="{{ asset('') }}public/assets/images/contact/02.png" alt="">
                        </div>
                        <div class="content">
                            <div class="icone">
                                <img src="{{ asset('') }}public/assets/images/contact/shape/02.svg" alt="">
                            </div>
                            <div class="info">
                                <span>Make A Quote</span>
                                <a href="mailto:{{ $settings->email }}">
                                    <h6>{{ $settings->email }}</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single contact area end -->
                <!-- single contact area -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="single-contact-one-inner">
                        <div class="thumbnail">
                            <img src="{{ asset('') }}public/assets/images/contact/03.png" alt="">
                        </div>
                        <div class="content">
                            <div class="icone">
                                <img src="{{ asset('') }}public/assets/images/contact/shape/03.svg" alt="">
                            </div>
                            <div class="info">
                                <span>Location</span>
                                <a href="javascript:;void(0)">
                                    <h6 class="addr">{{ $settings->address }}
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single contact area end -->
            </div>
        </div>
    </div>
    <!-- conact single area end -->

    <!-- conact us form fluid start -->
    <div class="rts-contact-form-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="rts-contact-fluid rts-section-gap">
                        <div class="rts-title-area contact-fluid text-center mb--50">
                            <p class="pre-title">
                                Get In Touch
                            </p>
                            <h2 class="title">Needs Help? Let’s Get in Touch</h2>
                        </div>
                        <div class="form-wrapper">
                            <div name="resp"></div>
                            <ul id="form-messages" style="padding: 0"></ul>
                            <form class="homeContact" id="homeContact" action="{{ route('public.contact.store') }}"
                                method="post">
                                @csrf
                                <div class="col-12 col-sm-6 mx-auto">
                                    <input type="text" id="name" name="name" placeholder="Enter Full Name">
                                    <input type="email" id="email" name="email" placeholder="Enter Email Address">
                                    <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number">
                                    <textarea placeholder="Type Your Message" id="message" name="message" style="margin-bottom: 20px"></textarea>
                                </div>
                                <button type="submit" class="rts-btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- conact us form fluid end -->
@endsection

@section('scripts')
    <script src="{{ asset('') }}public/assets/projects/contact/index.js"></script>
@endsection
