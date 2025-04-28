@extends('console.layouts.app')

@section('title', 'Settings')


@section('content')
    <!-- Page Header -->
    <div class="block justify-between page-header md:flex">
        <div>
            <h3 class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                Settings</h3>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- End::row-3 -->

    <!-- Start::row-3 -->
    <div class="grid m-auto w-1/2">
        <div class="col-span-12">
            <div class="" id="addPricing">
                <div class="box">
                    <div class="box-body">
                        <form class="space-y-3" id="settingsForm" name="settingsForm" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div>
                                <div>
                                    <h5 class="box-title">Contact Name</h5>
                                </div>
                                <div class="mt-3">
                                    <div>
                                        <div class="space-y-2">
                                            <input type="hidden" id="settingsId" value="0">
                                            <input type="text" id="name" name="name" placeholder="Enter a Name"
                                                class="mb-2 py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h5 class="box-title">Email</h5>
                                </div>
                                <div class="mt-3">
                                    <div class="mt-3">
                                        <div class="rounded-sm">
                                            <input type="text" id="email" name="email" placeholder="Enter a Email"
                                                class="mb-2 py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h5 class="box-title">Mobile Number</h5>
                                </div>
                                <div class="mt-3">
                                    <div class="mt-3">
                                        <div class="rounded-sm">
                                            <input type="text" id="mobile" name="mobile"
                                                placeholder="Enter a Mobile Number"
                                                class="mb-2 py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div>
                                    <h5 class="box-title">Address</h5>
                                </div>
                                <div class="mt-5">
                                    <div>
                                        <div class="space-y-2">
                                            <div class="rounded-sm">
                                                <textarea name="address" id="address" class="ti-form-input" rows="3" placeholder="Provide your Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between flex-wrap">
                                <div>
                                    <div>
                                        <h5 class="box-title">Logo</h5>
                                    </div>
                                    <div class="mt-5">
                                        <input type="file" name="logo" id="logo"
                                            class="filepond basic-filepond w-64 mb-2" onchange="previewFile1(this);"
                                            data-allow-reorder="true" data-max-file-size="1MB" data-max-files="1">
                                        <div id="logoMain">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <h5 class="box-title">Favicon</h5>
                                    </div>
                                    <div class="mt-5">
                                        <input type="file" name="favicon" id="favicon"
                                            class="filepond basic-filepond w-64 mb-2" onchange="previewFile2(this);"
                                            data-allow-reorder="true" data-max-file-size="1MB" data-max-files="1">
                                        <div id="faviconMain">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-green-600 text-[10px]">Image must be jpg, jpeg, png!</p>
                                <p class="text-green-600 text-[10px] -mt-2">Image size should be &lt; 1 Mb</p>
                            </div>
                            <div>
                                <div>
                                    <h5 class="box-title">Marquee</h5>
                                </div>
                                <div class="mt-5">
                                    <div>
                                        <div class="rounded-sm">
                                            <input type="text" id="marquee" name="marquee"
                                                placeholder="Enter Marquee Content"
                                                class="mb-2 py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div>
                                    <h5 class="box-title">Meta Description</h5>
                                </div>
                                <div class="mt-5">
                                    <div>
                                        <div class="space-y-2">
                                            <div class="rounded-sm">
                                                <textarea name="metadesc" id="metadesc" class="ti-form-input" rows="3"
                                                    placeholder="Provide some Meta Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h5 class="box-title">Meta Keyword</h5>
                                </div>
                                <div class="mt-5">
                                    <div>
                                        <div class="rounded-sm">
                                            <input type="text" id="metakey" name="metakey"
                                                placeholder="Enter a Keyword"
                                                class="mb-2 py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="btn-save" class="ti-btn ti-btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::row-3 -->
@endsection


@section('scripts')
    <script src="{{ asset('') }}console/assets/projects/settings/index.js"></script>
@endsection
