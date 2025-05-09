@extends('public.layouts.app')

@section('title', 'Pricing')

@section('content')
    <!-- start breadcrumb area -->
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Price Plans</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">Price Plans</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb area -->


    <!-- rts pricing area start -->
    <div class="rts-pricing-area rts-section-gap pt--70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pricing-tab-button-area">
                        <h4>Here are our Various Options to choose.</h4>
                    </div>
                </div>
            </div>
            <div class="row mt--70">
                <div class="col-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row g-5">
                                <!-- single pricing plane -->
                                @foreach ($pricings as $pricing)
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb--20">
                                        <h5>{{ $pricing->name }}</h5>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <tbody class="text-center">
                                                            <tr>
                                                                <td style="border: 1px solid black">Monthly</td>
                                                                <td style="border: 1px solid black">&#8377;
                                                                    {{ $pricing->monthly }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="border: 1px solid black">Quarterly</td>
                                                                <td style="border: 1px solid black">&#8377;
                                                                    {{ $pricing->quartly }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="border: 1px solid black">Half Yearly</td>
                                                                <td style="border: 1px solid black">&#8377;
                                                                    {{ $pricing->halfyearly }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="border: 1px solid black">Yearly</td>
                                                                <td style="border: 1px solid black">&#8377;
                                                                    {{ $pricing->yearly }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts pricing area end -->

@endsection
