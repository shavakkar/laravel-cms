@extends('public.layouts.app')

@section('title', 'KYC Form')

@section('content')
    <main>
        <!-- about start -->
        <section class="mt--40 mb--100" id="elem">
            <div class="container p-5 shadow">
                <div class="row ps-3">
                    <div class="mb-8 ">
                        <div>
                            <h2 class="ds-4 lh-1 fw-bold text-dark mb-5 text-center">KYC</h2>
                            <div class="row">
                                <div class="wow ">
                                    <div id="msgCont"></div>
                                    <div class="row text-black">
                                        {{-- Form --}}
                                        <form method="post" name="kycForm" id="kycForm"
                                            action="{{ route('public.kyc.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')

                                            <div>
                                                <h4 class="fs-0 fw-bold mb-3">Personal Details</h4>
                                                <div class="d-flex flex-wrap">
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        <span>Name<sup class="text-danger">*</sup></span>
                                                        <div class="mt--10">
                                                            <input type="text" name="name" id="name"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        <span>Email<sup class="text-danger">*</sup></span>
                                                        <div class="mt--10">
                                                            <input type="text" name="email" id="email"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your email" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        <span>Mobile<sup class="text-danger">*</sup></span>
                                                        <div class="mt--10">
                                                            <input type="text" name="mobile" id="mobile"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your mobile" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        <span>Aadhar<sup class="text-danger">*</sup></span>
                                                        <div class="mt--10">
                                                            <input type="text" name="aadhar" id="aadhar"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your Aadhar Number" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        <span>PAN<sup class="text-danger">*</sup></span>
                                                        <div class="mt--10">
                                                            <input type="text" name="pan" id="pan"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your PAN Number" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt--40">
                                                <h4 class="fs-0 fw-bold mb-3">Permanent Address</h4>
                                                <div class="d-flex flex-wrap">
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        Address line 1<sup class="text-danger">*</sup>
                                                        <div class="input-group mt--10">
                                                            <input type="text" name="permAddress1" id="permAddress1"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your Address" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        Address Line 2<sup class="text-danger">*</sup>
                                                        <div class="input-group mt--10">
                                                            <input type="text" name="permAddress2" id="permAddress2"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your Address" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        City<sup class="text-danger">*</sup>
                                                        <div class="input-group mt--10">
                                                            <input type="text" name="permCity" id="permCity"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your city" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        State<sup class="text-danger">*</sup>
                                                        <div class="input-group mt--10">
                                                            <input type="text" name="permState" id="permState"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your state" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        Pincode<sup class="text-danger">*</sup>
                                                        <div class="input-group mt--10">
                                                            <input type="text" name="permPin" id="permPin"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your pincode" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt--40">
                                                <div class="mb-3 d-flex align-items-center flex-wrap">
                                                    <h4 class="fs-0 fw-bold mb-2 me-4">Current Address</h4>

                                                    <label for="same" class="text-decoration-underline">
                                                        as same as Permanant Address
                                                        <input type="checkbox" class="form-check-input border-2"
                                                            name="same" id="same"
                                                            style="opacity: 1; position: unset; height: auto; width: auto;">
                                                    </label>
                                                </div>

                                                <div class="d-flex flex-wrap">
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        Address line 1<sup class="text-danger">*</sup>
                                                        <div class="input-group mt--10">
                                                            <input type="text" name="currentAddress1"
                                                                id="currentAddress1"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your Address" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        Address Line 2<sup class="text-danger">*</sup>
                                                        <div class="input-group mt--10">
                                                            <input type="text" name="currentAddress2"
                                                                id="currentAddress2"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your Address" />
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        City<sup class="text-danger">*</sup>
                                                        <div class="input-group mt--10">
                                                            <input type="text" name="currentCity" id="currentCity"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your city" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        State<sup class="text-danger">*</sup>
                                                        <div class="input-group mt--10">
                                                            <input type="text" name="currentState" id="currentState"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your state" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        Pincode<sup class="text-danger">*</sup>
                                                        <div class="input-group mt--10">
                                                            <input type="text" name="currentPin" id="currentPin"
                                                                class="form-control border-bottom rounded-0 fs-4"
                                                                placeholder="Enter your pincode" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt--40">
                                                <div class="mb-3">
                                                    <h4 class="fs-0 fw-bold">Document Upload</h4>
                                                    <div class="text-success fs-5">Image must be jpg, jpeg, png format
                                                    </div>
                                                    <div class="text-success fs-5">Image size should be less than 1Mb</div>
                                                </div>
                                                <div class="d-flex flex-wrap col-12 col-lg-12">
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        Aadhar card<sup class="text-danger">*</sup>
                                                        <div class="mt--10">
                                                            <input type="file" name="aadharphoto" id="aadharphoto"
                                                                class="form-control border-bottom rounded-0 fs-4 photo"
                                                                style="height: auto;" />
                                                            <div id="image1" class="mt-2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        PAN card<sup class="text-danger">*</sup>
                                                        <div class="mt--10">
                                                            <input type="file" name="panphoto" id="panphoto"
                                                                class="form-control border-bottom rounded-0 fs-4 photo"
                                                                style="height: auto;" />
                                                            <div id="image2" class="mt-2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 pe-4 my-4">
                                                        Passport Photo<sup class="text-danger">*</sup>
                                                        <div class="mt--10">
                                                            <input type="file" name="userphoto" id="userphoto"
                                                                class="form-control border-bottom rounded-0 fs-4 photo"
                                                                style="height: auto;" />
                                                            <div id="image3" class="mt-2"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <button type="submit" id="submitBtn"
                                                    class="rts-btn btn-primary-3 mt--30 text-start w-auto">Submit<i
                                                        class="bi bi-arrow-right ms-1"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about end -->

    </main>

@endsection

@section('scripts')
    <script src="{{ asset('') }}public/assets/projects/kyc/index.js"></script>
@endsection
