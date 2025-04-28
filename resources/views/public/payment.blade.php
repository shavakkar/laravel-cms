@extends('public.layouts.app')

@section('title', 'Payment')

@section('content')

    <!-- start breadcrumb area -->
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Payment</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb area -->

    {{-- <section class="wrapper !bg-[#edf2fc]">
        <div class="container py-[4.5rem] xl:!py-28 lg:!py-28 md:!py-28">
            <div class="flex flex-wrap mx-[-15px] !relative">
                <div class="mt--40">
                    <h3 class="text-center">
                        Choose any Payment Methods that is convenient for you.</h3>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="mt--40 mb--40">
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 mt--20">
                        <div class="p-2 d-md-block d-flex justify-content-center text-black">
                            <div class="border p-5 bg-color-gray">

                                <div class="d-flex align-items-center mb--20 gap-4">
                                    <img class="" src="{{ asset('') }}public/assets/images/hdfc.png" width="50"
                                        alt="image">
                                    <div class="">
                                        <h5 class="m--0">Bank Details</h5>
                                        <p class="">HDFC Bank</p>
                                    </div>
                                </div>
                                <p class="mb--15">Name - TESTSEVA</p>
                                <p class="mb--15">Ac no - 00000000000000</p>
                                <p class="mb--15">IFSC - HDFC0000000</p>
                                <p class="mb--15">Type of Ac - Current</p>
                                <p class="mb--15">UPI Number : 1234567890</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/column -->
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 mt--20">
                        <div class="p-2 d-md-block d-flex justify-content-center text-black">
                            <div class="border p-5 bg-color-gray">

                                <div class="d-flex align-items-center mb--20 gap-4">
                                    <img class="" src="{{ asset('') }}public/assets/images/icici.png" width="50"
                                        alt="image">
                                    <div class="">
                                        <h5 class="m--0">Bank Details</h5>
                                        <p class="">ICICI Bank</p>
                                    </div>
                                </div>
                                <p class="mb--15">Name - TESTSEVA</p>
                                <p class="mb--15">Ac no - 000000000000</p>
                                <p class="mb--15">IFSC - ICIC0000000</p>
                                <p class="mb--15">Type of Ac - Current</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/column -->
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 mt--20">
                        <div class="p-2 d-md-block d-flex justify-content-center text-black">
                            <div class="border p-5 bg-color-gray">

                                <div class="d-flex align-items-center mb--20 gap-4">
                                    <img class="" src="{{ asset('') }}public/assets/images/upi.webp" width="50"
                                        alt="image">
                                    <div class="">
                                        <h5 class="m--0">Scan & Pay</h5>
                                        <p class="!mb-0 text-[.85rem]">ICICI Bank</p>
                                    </div>
                                </div>
                                <p class="mb--15">Name - TESTSEVA</p>
                                <p class="mb--15">Ac no - 000000000000</p>
                                <p class="mb--15">IFSC - ICIC0000000</p>
                                <p class="mb--15">Type of Ac - Current</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.grid-view -->
        </div>
        <!-- /.container -->
    </section> --}}

    <div class="rts-service-area mt--50 mb--100">
        <div class="container">
            <div class="row">
                <div class="title-area service-h2">
                    <h3 class="title">Choose any Payment Method that is convenient for you.</h3>
                </div>
            </div>
            <div class="row g-5 mt--10 d-flex align-items-stretch">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 d-flex flex-column">
                    <!-- single service start -->
                    <div class="rts-single-service-h2 bg-light d-flex flex-column flex-grow-1">
                        <div class="body">
                            <div class="d-flex align-items-center mb--20 gap-4">
                                <img class="" src="{{ asset('') }}public/assets/images/hdfc.png" width="50"
                                    alt="image">
                                <div class="">
                                    <h5 class="m--0">Bank Details</h5>
                                    <p class="">HDFC Bank</p>
                                </div>
                            </div>
                            <p class="mb--15 text-body">Name - TESTSEVA</p>
                            <p class="mb--15 text-body">Ac no - 00000000000000</p>
                            <p class="mb--15 text-body">IFSC - HDFC0000000</p>
                            <p class="mb--15 text-body">Type of Ac - Current</p>
                            <p class="mb--15 text-body">UPI Number : 1234567890</p>
                        </div>
                    </div>
                    <!-- single service End -->
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 d-flex flex-column">
                    <!-- single service start -->
                    <div class="rts-single-service-h2 bg-light d-flex flex-column flex-grow-1">
                        <div class="body">
                            <div class="d-flex align-items-center mb--20 gap-4">
                                <img class="" src="{{ asset('') }}public/assets/images/icici.png" width="50"
                                    alt="image">
                                <div class="">
                                    <h5 class="m--0">Bank Details</h5>
                                    <p class="">ICICI Bank</p>
                                </div>
                            </div>
                            <p class="mb--15 text-body">Name - TESTSEVA</p>
                            <p class="mb--15 text-body">Ac no - 000000000000</p>
                            <p class="mb--15 text-body">IFSC - ICIC0000000</p>
                            <p class="mb--15 text-body">Type of Ac - Current</p>
                        </div>
                    </div>
                    <!-- single service End -->
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 d-flex flex-column">
                    <!-- single service start -->
                    <div class="rts-single-service-h2 bg-light d-flex flex-column flex-grow-1">
                        <div class="body">
                            <div class="d-flex align-items-center mb--20 gap-4">
                                <img class="" src="{{ asset('') }}public/assets/images/upi.webp" width="50"
                                    alt="image">
                                <div class="">
                                    <h5 class="m--0">Scan & Pay</h5>
                                    {{-- <p class="!mb-0 text-[.85rem]">ICICI Bank</p> --}}
                                </div>
                            </div>
                            <p class="mb--15 text-body">Name - TESTSEVA</p>
                            <p class="mb--15 text-body">Ac no - 000000000000</p>
                            <p class="mb--15 text-body">IFSC - ICIC0000000</p>
                            <p class="mb--15 text-body">Type of Ac - Current</p>
                        </div>
                    </div>
                    <!-- single service End -->
                </div>
            </div>
        </div>
    </div>
    <!-- latest service area End -->
@endsection
