<header class="header--sticky header-one header-four header-five header-six seven">
    <div class="header-top header-top-one header-top-four header-top-five header-top-six seven">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="d-flex">
                    {{-- <p class="top-left">Are you ready to grow up your business? </p> --}}
                    <marquee class="mr--10 text-primary-emphasis text-decoration-underline pt-1 pb-1" direction=”right”
                        onmouseover="stop()" onmouseout="start()" style="font-weight: bold; color: #f64a00;">
                        {{ $settings->marquee }}
                    </marquee>
                </div>
                <div class="right-h-three">
                    <div class="header-top-right">
                        <div class="single-right email align-items-center d-flex">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                        </div>
                        <div class="single-right call align-items-center d-flex" style="width: 155px">
                            <i class="far fa-phone-volume"></i>
                            <a href="tel:{{ $settings->mobile }}">+91 {{ $settings->mobile }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main-one bg-white header-main-five six">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-6">
                    <div class="thumbnail">
                        <a href="/">
                            <h4 class="text-primary" style="margin: 0">Testseva</h4>
                        </a>
                    </div>
                </div>
                <div class=" col-xl-9 col-lg-8 col-md-8 col-sm-8 col-6">
                    <div class="main-header main-header-four main-header-five main-header-six seven">
                        <nav class="nav-main mainmenu-nav d-none d-xl-block">
                            <ul class="mainmenu">
                                <li><a class="nav-item {{ Route::current()->getName() == 'public.home' ? 'active1' : '' }}"
                                        href="/">Home</a></li>
                                <li><a class="nav-item {{ Route::current()->getName() == 'public.about' ? 'active1' : '' }}"
                                        href="/about">About Us</a></li>
                                <li><a class="nav-item {{ Route::current()->getName() == 'public.services' ? 'active1' : '' }}"
                                        href="/services">Services</a></li>
                                <li><a class="nav-item {{ Route::current()->getName() == 'public.pricing' ? 'active1' : '' }}"
                                        href="/pricing">Pricing</a></li>
                                <li><a class="nav-item {{ Route::current()->getName() == 'public.payment' ? 'active1' : '' }}"
                                        href="/payment">Payment</a></li>
                                <li class="has-droupdown menu-item">
                                    <a class="menu-link {{ (Route::current()->getName() == 'public.complaint' ? 'active1' : '' || Route::current()->getName() == 'public.disposal') ? 'active1' : '' }} "
                                        href="#">Complaints</a>
                                    <ul class="submenu">
                                        <li class="mobile-menu-link"><a
                                                class="{{ Route::current()->getName() == 'public.complaint' ? 'active1' : '' }}"
                                                href="/complaint">Complaint Board</a></li>
                                        <li class="mobile-menu-link"><a
                                                class="{{ Route::current()->getName() == 'public.disposal' ? 'active1' : '' }}"
                                                href="/disposal">Disposal</a></li>
                                    </ul>
                                </li>
                                <li><a class="nav-item {{ Route::current()->getName() == 'public.contact' ? 'active1' : '' }}"
                                        href="/contact">Contact Us</a></li>
                            </ul>
                        </nav>
                        <div class="button-area d-xl-none">
                            <button id="menu-btn"
                                class="menu rts-btn btn-primary-alta btn-primary-alta-four ml--20 ml_sm--5">
                                <img class="menu-dark" src="{{ asset('') }}public/assets/images/icon/menu.png"
                                    alt="Menu-icon">
                                <img class="menu-light"
                                    src="{{ asset('') }}public/assets/images/icon/menu-light.png" alt="Menu-icon">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
