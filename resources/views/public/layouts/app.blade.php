<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}assets/images/fav.png"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/storage/' . $settings->favicon) }}">
    <link rel="stylesheet" href="{{ asset('') }}public/assets/css/plugins/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('') }}public/assets/css/plugins/fontawesome-5.css">
    <link rel="stylesheet" href="{{ asset('') }}public/assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="{{ asset('') }}public/assets/css/plugins/unicons.css">
    <link rel="stylesheet" href="{{ asset('') }}public/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}public/assets/css/style.css">

    <meta name="description" content="{{ $settings->metadesc }}">
    <meta name="keywords" content="{{ $settings->metakey }}">
    <meta name="author" content="Sourcefile Solutions Pvt Ltd">

    <script>
        const CONSOLE_URL = "{{ env('CONSOLE_URL') }}";
    </script>
</head>

<body class="index-six">
    <!-- start header area -->
    @include('public.layouts.header')
    <!-- End header area -->

    @include('public.layouts.sidebar')

    <div id="anywhere-home"></div>


    @yield('content')


    <!-- rts footer area start -->
    @include('public.layouts.footer')
    <!-- rts footer area end -->


    <!-- progress Back to top -->
    @include('public.layouts.progress')
    <!-- progress Back to top End -->




    <!-- scripts start form hear -->
    <script src="{{ asset('') }}public/assets/js/vendor/jquery.min.js"></script>
    <script src="{{ asset('') }}public/assets/js/vendor/jqueryui.js"></script>
    <script src="{{ asset('') }}public/assets/js/vendor/waypoint.js"></script>
    <script src="{{ asset('') }}public/assets/js/vendor/axios.js"></script>
    <script src="{{ asset('') }}public/assets/js/plugins/swiper.js"></script>
    <script src="{{ asset('') }}public/assets/js/plugins/counterup.js"></script>
    <script src="{{ asset('') }}public/assets/js/plugins/sal.min.js"></script>
    <script src="{{ asset('') }}public/assets/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('') }}public/assets/js/vendor/waw.js"></script>
    <script src="{{ asset('') }}public/assets/js/plugins/contact.form.js"></script>
    <!-- main Js -->
    <script src="{{ asset('') }}public/assets/js/main.js"></script>
    <!-- scripts end form hear -->

    @yield('scripts')
</body>

</html>
