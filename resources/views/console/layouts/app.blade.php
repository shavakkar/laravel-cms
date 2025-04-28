<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" class="light" data-header-styles="light"
    data-menu-styles="dark">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/storage/' . $settings->favicon) }}">

    <title>@yield('title')</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/3.4.4/luxon.js"
        integrity="sha512-Y0hNpPUGIlAoQY6XHJFOCN3OfCPtNtUqiyfOOPbZ8kMrHfyFXv1v6Hn6rMA1G+KmMG/TSLeo0vuULkJZToFu0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Main JS -->
    <script src="{{ asset('') }}console/assets/js/main.js"></script>

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('') }}console/assets/css/style.css">

    <!-- Simplebar Css -->
    <link rel="stylesheet" href="{{ asset('') }}console/assets/libs/simplebar/simplebar.min.css">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('') }}console/assets/libs/%40simonwep/pickr/themes/nano.min.css">

    <!-- Vector Map Css-->
    <link rel="stylesheet" href="{{ asset('') }}console/assets/libs/jsvectormap/css/jsvectormap.min.css">

    <!-- Tabulator Css -->
    <link rel="stylesheet" href="{{ asset('') }}console/assets/libs/tabulator-tables/css/tabulator.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet"
        href="{{ asset('') }}console/assets/libs/choices.js/public/assets/styles/choices.min.css">

</head>

<body class="">


    <div class="page">

        <!-- Start::app-sidebar -->
        @include('console.layouts.side-bar')
        <!-- End::app-sidebar -->

        <!-- Start::Header -->
        @include('console.layouts.header')
        <!-- End::Header -->

        <div class="content">

            <!-- Start::main-content -->
            <div class="main-content">

                @yield('content')

            </div>
            <!-- Start::main-content -->

        </div>



        @include('console.layouts.footer')


    </div>

    <!-- Index JS -->
    {{-- <script src="{{ asset('') }}console/assets/js/index.js"></script> --}}

    <!-- Back To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill text-xl"></i></span>
    </div>

    <div id="responsive-overlay"></div>

    <!-- popperjs -->
    <script src="{{ asset('') }}console/assets/libs/%40popperjs/core/umd/popper.min.js"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('') }}console/assets/libs/%40simonwep/pickr/pickr.es5.min.js"></script>

    <!-- sidebar JS -->
    <script src="{{ asset('') }}console/assets/js/defaultmenu.js"></script>

    <!-- sticky JS -->
    <script src="{{ asset('') }}console/assets/js/sticky.js"></script>

    <!-- Switch JS -->
    <script src="{{ asset('') }}console/assets/js/switch.js"></script>

    <!-- Preline JS -->
    <script src="{{ asset('') }}console/assets/libs/preline/preline.js"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('') }}console/assets/libs/simplebar/simplebar.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('') }}console/assets/js/custom.js"></script>

    <!-- Custom-Switcher JS -->
    <script src="{{ asset('') }}console/assets/js/custom-switcher.js"></script>


    <script src="{{ asset('') }}console/assets/js/axios.js"></script>

    <!-- Tabulator JS -->
    <script src="{{ asset('') }}console/assets/libs/tabulator-tables/js/tabulator.min.js"></script>

    <!-- Choices JS -->
    <script src="{{ asset('') }}console/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- XLXS JS -->
    {{-- <script src="{{ asset('') }}console/assets/libs/xlsx/xlsx.full.min.js"></script> --}}

    <!-- JSPDF JS -->
    {{-- <script src="{{ asset('') }}console/assets/libs/jspdf/jspdf.umd.min.js"></script>
    <script src="{{ asset('') }}console/assets/libs/jspdf-autotable/jspdf.plugin.autotable.min.js"></script> --}}


    {{-- <script src="{{ asset('') }}assets/libs/tom-select/js/tom-select.complete.min.js"></script>
    <script src="{{ asset('') }}assets/js/tom-select.js"></script> --}}


    <script>
        window.addEventListener("pageshow", function(event) {
            var historyTraversal = event.persisted ||
                (typeof window.performance != "undefined" &&
                    window.performance.navigation.type === 2);
            if (historyTraversal) {
                // Handle page restore.
                window.location.reload();
            }
        });
    </script>

    <!-- Tabulator Custom JS -->
    @yield('scripts')

</body>


</html>
