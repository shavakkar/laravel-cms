@extends('console.layouts.app')

@section('title', 'Pricing')


@section('content')
    <!-- Page Header -->
    <div class="block justify-between page-header md:flex">
        <div>
            <h3 class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                Pricing</h3>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- End::row-3 -->
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-3">

            <div class="col-span-12 xxl:col-span-6" id="addPricing">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Add Pricing</h5>
                    </div>
                    <div class="box-body">
                        <form class="space-y-3" id="pricingForm" name="pricingForm" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div>
                                    <h5 class="box-title">Service</h5>
                                </div>
                                <div class="mt-3">
                                    <div>
                                        <div class="space-y-2">
                                            <select class="ti-form-select" name="service_id" id="service_id">
                                                <option value="">Choose an Option</option>
                                            </select>
                                            {{-- <input type="text" id="service" name="service"
                                                placeholder="Enter Service Name"
                                                class="py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h5 class="box-title">Monthly</h5>
                                </div>
                                <div class="mt-3">
                                    <div class="mt-3">
                                        <div class="rounded-sm">
                                            <input type="text" id="monthly" name="monthly"
                                                placeholder="Enter Monthly Amount"
                                                class="py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h5 class="box-title">Quarterly</h5>
                                </div>
                                <div class="mt-3">
                                    <div class="mt-3">
                                        <div class=" rounded-sm">
                                            <input type="text" id="quartly" name="quartly"
                                                placeholder="Enter Quarterly Amount"
                                                class="py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h5 class="box-title">Half yearly</h5>
                                </div>
                                <div class="mt-3">
                                    <div class="mt-3">
                                        <div class=" rounded-sm">
                                            <input type="text" id="halfyearly" name="halfyearly"
                                                placeholder="Enter Half yearly Amount"
                                                class="py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h5 class="box-title">Yearly</h5>
                                </div>
                                <div class="mt-3">
                                    <div>
                                        <div class=" space-y-2">
                                            <div class="mt-3">
                                                <div class=" rounded-sm">
                                                    <input type="text" id="yearly" name="yearly"
                                                        placeholder="Enter Yearly Amount"
                                                        class="py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h5 class="box-title">Status</h5>
                                </div>
                                <div class="mt-3">
                                    <div>
                                        <div class=" space-y-2">
                                            <select class="ti-form-select" name="status" id="status">
                                                <option value="">Choose an Option</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="btn-save" class="ti-btn ti-btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="hide" id="editPricing">
                <div class="col-span-12 lg:col-span-5">
                    <div class="box">
                        <div class="box-header">
                            <h5 class="box-title">Edit Pricing</h5>
                        </div>
                        <div class="box-body">
                            <form name="formPricing" id="formPricing" class="space-y-3" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div>
                                    <div>
                                        <h5 class="box-title">Service</h5>
                                    </div>
                                    <input type="hidden" id="pricingId" value="0">
                                    <div class="mt-3">
                                        <div>
                                            <div class="grid space-y-2">
                                                <select class="ti-form-select" name="service_id" id="priceService_id">
                                                    <option value="">Choose an Option</option>
                                                </select>
                                                {{-- <input type="text" id="priceService" name="service"
                                                    placeholder="Enter Monthly Amount"
                                                    class="py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10"> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <h5 class="box-title">Monthly</h5>
                                    </div>
                                    <div class="mt-3">
                                        <div class="mt-3">
                                            <div class="flex rounded-sm">
                                                <input type="text" id="priceMonthly" name="monthly"
                                                    placeholder="Enter Monthly Amount"
                                                    class="py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <h5 class="box-title">Quarterly</h5>
                                    </div>
                                    <div class="mt-3">
                                        <div class="mt-3">
                                            <div class="flex rounded-sm">
                                                <input type="text" id="priceQuartly" name="quartly"
                                                    placeholder="Enter Quarterly Amount"
                                                    class="py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <h5 class="box-title">Half yearly</h5>
                                    </div>
                                    <div class="mt-3">
                                        <div class="mt-3">
                                            <div class="flex rounded-sm">
                                                <input type="text" id="priceHalfyearly" name="halfyearly"
                                                    placeholder="Enter Half Yearly Amount"
                                                    class="py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <h5 class="box-title">Yearly</h5>
                                    </div>
                                    <div class="mt-3">
                                        <div>
                                            <div class="grid space-y-2">
                                                <div class="mt-3">
                                                    <div class="flex rounded-sm">
                                                        <input type="text" id="priceYearly" name="yearly"
                                                            placeholder="Enter Yearly Amount"
                                                            class="py-2 px-3 rtl:pl-11 ti-form-input rounded-none ltr:rounded-r-sm rtl:rounded-l-sm focus:z-10">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <h5 class="box-title">Status</h5>
                                    </div>
                                    <div class="mt-3">
                                        <div>
                                            <div class="grid space-y-2">
                                                <select class="ti-form-select" name="status" id="priceStatus">
                                                    <option value="">Choose an Option</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <a id="cancelBtn" class="ti-btn cursor-pointer"
                                        style="background-color: red; color: white;">Cancel</a>
                                    <button id="edit-post" class="ti-btn ti-btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-9">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">Pricing</h5>
                </div>
                <div class="box-body">
                    <div class="overflow-auto table-bordered">
                        <div id="basic-table" class="ti-custom-table ti-striped-table ti-custom-table-hover">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            {{-- <button type="button" id="modalBtn" class="hs-dropdown-toggle ti-btn ti-btn-primary"
                data-hs-overlay="#hs-vertically-centered-modal">
                Vertically centered modal
            </button> --}}

            <div id="hs-vertically-centered-modal" class="hs-overlay hidden ti-modal">
                <div
                    class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out min-h-[calc(100%-3.5rem)] flex items-center justify-center">
                    <div class="ti-modal-content">
                        <div class="ti-modal-header">
                            <h3 class="ti-modal-title">
                                Delete Action
                            </h3>
                            <button type="button" class="hs-dropdown-toggle ti-modal-close-btn"
                                data-hs-overlay="#hs-vertically-centered-modal">
                                <span class="sr-only">Close</span>
                                <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                        <div class="ti-modal-body">
                            <p class="text-gray-800 dark:text-white/70">
                                Are you sure, you want to Delete?
                            </p>
                        </div>
                        <div class="ti-modal-footer">
                            <button type="button"
                                class="hs-dropdown-toggle ti-btn ti-border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:ring-offset-white focus:ring-primary dark:bg-bgdark dark:hover:bg-black/20 dark:border-white/10 dark:text-white/70 dark:hover:text-white dark:focus:ring-offset-white/10"
                                data-hs-overlay="#hs-vertically-centered-modal">
                                Close
                            </button>
                            <a class="ti-btn" id="delBtn1" style="background-color: red; color: white;"
                                href="javascript:void(0);">
                                Delete
                            </a>
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
    <script src="{{ asset('') }}console/assets/projects/pricing/index.js"></script>
    <script src="{{ asset('') }}console/assets/js/datatableSRPricing.js"></script>
@endsection
