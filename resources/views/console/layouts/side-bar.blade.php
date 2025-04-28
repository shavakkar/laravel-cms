<aside class="app-sidebar" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <div class="overflow-hidden">
            <a href="/" id="sideBarLogo" class="header-logo text-xl text-custom bg-white p-1.5 rounded-md">
                {{-- <img src="{{ asset('/storage/' . $settings->logo) }}" alt="" class="main-logo desktop-dark">
                <img src="{{ asset('/storage/' . $settings->favicon) }}" alt="" width="40"
                    class="main-logo toggle-dark rounded-full"> --}}
                Testseva
            </a>
        </div>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar " id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg></div>
            <ul class="main-menu">

                <li class="slide">
                    <a href="/"
                        class="side-menu__item {{ Route::current()->getName() == 'console.home' ? 'active' : '' }}">
                        <i class="ri-home-8-line side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="/banner"
                        class="side-menu__item {{ Route::current()->getName() == 'console.banner' ? 'active' : '' }}">
                        <i class="ti ti-resize side-menu__icon"></i>
                        <span class="side-menu__label">Banner</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="/services"
                        class="side-menu__item {{ Route::current()->getName() == 'console.services' ? 'active' : '' }}">
                        <i class="ti ti-replace side-menu__icon"></i>
                        <span class="side-menu__label">Services</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="/pricing"
                        class="side-menu__item {{ Route::current()->getName() == 'console.pricing' ? 'active' : '' }}">
                        <i class="ti
                        ti-report-money side-menu__icon"></i>
                        <span class="side-menu__label">Pricing</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="/contact"
                        class="side-menu__item {{ Route::current()->getName() == 'console.contact' ? 'active' : '' }}">
                        <i class="ti
                        ti-phone-call side-menu__icon"></i>
                        <span class="side-menu__label">Contact</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="/kyc"
                        class="side-menu__item {{ Route::current()->getName() == 'console.kyc' ? 'active' : '' }}">
                        <i class="ti
                        ti-file-analytics side-menu__icon"></i>
                        <span class="side-menu__label">KYC Details</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="/complaints"
                        class="side-menu__item {{ Route::current()->getName() == 'console.complaints' ? 'active' : '' }}">
                        <i class="
                        ri-customer-service-2-line side-menu__icon"></i>
                        <span class="side-menu__label">Complaints</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="/disposal"
                        class="side-menu__item {{ Route::current()->getName() == 'console.disposal' ? 'active' : '' }}">
                        <i class="ri-stack-line side-menu__icon"></i>
                        <span class="side-menu__label">Monthly Disposal</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="/disposalYear"
                        class="side-menu__item {{ Route::current()->getName() == 'console.disposalYear' ? 'active' : '' }}">
                        <i class="ri-chat-poll-line side-menu__icon"></i>
                        <span class="side-menu__label">Yearly Disposal</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="/settings"
                        class="side-menu__item {{ Route::current()->getName() == 'console.settings' ? 'active' : '' }}">
                        <i class="ti
                        ti-settings side-menu__icon"></i>
                        <span class="side-menu__label">Settings</span>
                    </a>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
