<!DOCTYPE html>
<html lang="en" dir="ltr" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('') }}console/assets/css/style.css">

    <!-- Simplebar Css -->
    <link rel="stylesheet" href="{{ asset('') }}console/assets/libs/simplebar/simplebar.min.css">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('') }}console/assets/libs/%40simonwep/pickr/themes/nano.min.css">

</head>


<body class="authentication-page">

    <main id="content" class="w-full max-w-md mx-auto p-6">
        <div class="m-auto text-center">
            <a class="py-2 px-3 border border-transparent font-semibold bg-primary text-white text-2xl rounded-sm"
                href="/">
                Testseva
            </a>
        </div>
        <div class="mt-7 bg-white rounded-sm shadow-sm dark:bg-bgdark">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Login in</h1>
                </div>

                <div class="mt-5">

                    <hr class="pb-5">

                    <!-- Form -->
                    <form action="{{ route('login') }}" method="post" novalidate autocomplete="off">
                        @csrf
                        <div>
                            <div class="grid gap-y-4">
                                <div>
                                    <label for="email" class="block text-sm mb-2 dark:text-white">Email
                                        address</label>
                                    <div class="relative">
                                        <input type="email" id="email" name="email"
                                            class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70">
                                    </div>
                                    @error('email')
                                        <div class="text-danger text-[12px]">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <div class="flex justify-between items-center">
                                        <label for="password"
                                            class="block text-sm mb-2 dark:text-white">Password</label>
                                    </div>
                                    <div class="relative">
                                        <input autocomplete="new-password" type="password" id="password"
                                            name="password"
                                            class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70">
                                    </div>
                                    @error('password')
                                        <div class="text-danger text-[12px]">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button
                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-sm border border-transparent font-semibold bg-primary text-white hover:bg-primary focus:outline-none focus:ring-0 focus:ring-primary focus:ring-offset-0 transition-all text-sm dark:focus:ring-offset-white/10">Sign
                                    in</button>
                            </div>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </main>

    <!-- popperjs -->
    <script src="{{ asset('') }}console/assets/libs/%40popperjs/core/umd/popper.min.js"></script>

    <!-- Custom-Switcher JS -->
    <script src="{{ asset('') }}console/assets/js/custom-switcher.js"></script>

    <!-- Preline JS -->
    <script src="{{ asset('') }}console/assets/libs/preline/preline.js"></script>


</body>

</html>
