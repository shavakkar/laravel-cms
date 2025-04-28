@extends('console.layouts.app')

@section('title', 'Contact')


@section('content')
    <!-- Page Header -->
    <div class="block justify-between page-header md:flex">
        <div>
            <h3 class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                Contact</h3>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- End::row-3 -->

    <!-- Start::row-3 -->
    <div>
        <div>
            <div class="box">
                <div class="box-body">
                    <div class="overflow-auto table-bordered">
                        <div id="basic-table" class="ti-custom-table ti-striped-table ti-custom-table-hover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::row-3 -->
@endsection


@section('scripts')

    <script src="{{ asset('') }}console/assets/js/datatableSRContact.js"></script>

@endsection
