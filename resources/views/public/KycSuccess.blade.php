@extends('public.layouts.app')

@section('title', 'KYC')

@section('content')
    <main>
        <!-- about start -->
        <section class="mt--100 mb--100">
            <div class="container p-5 shadow">
                <div class="row ps-3">
                    <div class="mb-8 ">
                        <div>
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <h4>Form Submitted Successfully!</h4>
                                <div>
                                    <a href="/" class="text-decoration-underline">Go to Home</a>
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
