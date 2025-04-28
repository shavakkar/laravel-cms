@extends('console.layouts.app')

@section('title', 'KYC Details')


@section('content')
    <!-- Page Header -->
    <div class="block justify-between page-header md:flex">
        <div>
            <h3 class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                KYC</h3>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- End::row-3 -->
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">KYC Details</h5>
                </div>
                <div class="box-body">
                    <div class="overflow-auto table-bordered">
                        <div id="basic-table" class="ti-custom-table ti-striped-table ti-custom-table-hover">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Start::row-3 -->

    <!-- End::row-3 -->
@endsection


@section('scripts')
    <script src="{{ asset('') }}console/assets/js/datatableSRKyc.js"></script>
@endsection
