<header class="header custom-sticky !top-0 !w-full">
    <nav class="main-header" aria-label="Global">
        <div class="header-content">
            <div class="header-left">
                <!-- Navigation Toggle -->
                <div class="">
                    <button type="button" class="sidebar-toggle !w-100 !h-100">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="ri-arrow-right-circle-line header-icon"></i>
                    </button>
                </div>
                <!-- End Navigation Toggle -->
            </div>

            <div class="responsive-logo">
                <a class="text-xl font-bold" href="/">
                    {{-- <img src="{{ asset('/storage/' . $settings->logo) }}" alt="" class="responsive-logo-dark"
                        width="220px"> --}}
                    Testseva
                </a>
            </div>

            <div class="header-right">
                <div class="responsive-headernav">
                    <div class="header-nav-right">
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('POST')
                            <button class="ti-btn ti-btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
