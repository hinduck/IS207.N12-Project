<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BaoThu Food</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.css"
        integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>

<body class="home-page home-01 ">

    <!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

    <!--header-->
    <header id="header" class="header header-style-1">
        <div class="container-fluid">
            <div class="row">
                <div class="topbar-menu-area">
                    <div class="container">
                        <div class="topbar-menu left-menu">
                            <ul>
                                <li class="menu-item">
                                    <a title="Hotline" href="#"><span
                                            class="icon label-before fa fa-mobile"></span>Hotline: (+84) 937-811-400</a>
                                </li>
                            </ul>
                        </div>
                        <div class="topbar-menu right-menu">
                            <ul>
                                @if (Route::has('login'))
                                    @auth
                                        @if (Auth::user()->utype === 'ADM')
                                            <li class="menu-item menu-item-has-children parent">
                                                <a title="My Account" href="#">{{ Auth::user()->name }}<i
                                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                                <ul class="submenu curency">
                                                    <li class="menu-item">
                                                        <a title="Dashboard" href="{{ route('admin.dashboard') }}">Bảng điều
                                                            khiển</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Categories" href="{{ route('admin.categories') }}">Danh
                                                            mục</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Attributes" href="{{ route('admin.attributes') }}">Đặc
                                                            điểm
                                                            mô tả</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Products" href="{{ route('admin.products') }}">Sản
                                                            phẩm</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Home Sliders"
                                                            href="{{ route('admin.homeslider') }}">Trang chiếu</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Home Categories"
                                                            href="{{ route('admin.homecategories') }}">Trang danh mục</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Manage Sales" href="{{ route('admin.onsale') }}">Khuyến
                                                            mãi</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Coupons" href="{{ route('admin.coupons') }}">Phiếu giảm
                                                            giá</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Orders List" href="{{ route('admin.orders') }}">Danh sách
                                                            các đơn hàng</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Contact Messages"
                                                            href="{{ route('admin.contact') }}">Tin nhắn liên hệ</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Settings" href="{{ route('admin.settings') }}">Cài
                                                            Đặt</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{ route('logout') }} "
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng
                                                            xuất</a>
                                                    </li>
                                                    <form id="logout-form" method="POST"
                                                        action="{{ route('logout') }}">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        @else
                                            <li class="menu-item menu-item-has-children parent">
                                                <a title="My Account" href="#">Xin chào,
                                                    ({{ Auth::user()->name }})<i class="fa fa-angle-down"
                                                        aria-hidden="true"></i></a>
                                                <ul class="submenu curency">
                                                    <li class="menu-item">
                                                        <a title="Dashboard" href="{{ route('user.dashboard') }}">Bảng
                                                            điều khiển</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="My Orders" href="{{ route('user.orders') }}">Đơn hàng
                                                            của bạn</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="My Profile" href="{{ route('user.profile') }}">Hồ sơ cá
                                                            nhân</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Change Password"
                                                            href="{{ route('user.changepassword') }}">Đổi mật khẩu</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{ route('logout') }} "
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng
                                                            xuất</a>
                                                    </li>
                                                    <form id="logout-form" method="POST"
                                                        action="{{ route('logout') }}">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        @endif
                                    @else
                                        <li class="menu-item"><a title="Register or Login"
                                                href="{{ route('login') }}">Đăng nhập</a></li>
                                        <li class="menu-item"><a title="Register or Login"
                                                href="{{ route('register') }}">Đăng ký</a></li>
                                    @endif

                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="mid-section main-info-area">

                            <div class="wrap-logo-top left-section">
                                <a href="/" class="link-to-home"><img
                                        src="{{ asset('assets/images/logo-top-1.png') }}" alt="mercado"></a>
                            </div>

                            @livewire('header-search-component')

                            <div class="wrap-icon right-section">
                                @livewire('wishlist-count-component')

                                @livewire('cart-count-component')
                                <div class="wrap-icon-section show-up-after-1024">
                                    <a href="#" class="mobile-navigation">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="nav-section header-sticky">
                        <div class="header-nav-section">
                            <div class="container">
                                <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu"
                                    data-menuname="Sale Info">
                                    <li class="menu-item"><a href="/" class="link-term">Nổi bật trong tuần</a><span
                                            class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="/shop" class="link-term">Khuyến mãi</a><span
                                            class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="/" class="link-term">Sản phẩm mới</a><span
                                            class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="/" class="link-term">Bán chạy nhất</a><span
                                            class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="/" class="link-term">Đánh giá cao</a><span
                                            class="nav-label hot-label">hot</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="primary-nav-section">
                            <div class="container">
                                <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                                    <li class="menu-item home-icon">
                                        <a href="/" class="link-term mercado-item-title"><i class="fa fa-home"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/about-us" class="link-term mercado-item-title">Về chúng tôi</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/shop" class="link-term mercado-item-title">Cửa hàng</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/cart" class="link-term mercado-item-title">Giỏ hàng</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/checkout" class="link-term mercado-item-title">Xác nhận thanh toán</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/contact-us" class="link-term mercado-item-title">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{ $slot }}

        @livewire('footer-component')

        <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
        <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('assets/js/functions.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
            integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.js"
            integrity="sha512-1mDhG//LAjM3pLXCJyaA+4c+h5qmMoTc7IuJyuNNPaakrWT9rVTxICK4tIizf7YwJsXgDC2JP74PGCc7qxLAHw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>

        {{-- <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>

        <script src="{{ asset('js/off-canvas.js') }}"></script>
        <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>

        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="{{ asset('js/data-table.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script> --}}

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/6388a2eab0d6371309d21f3a/1gj6ropsp';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>

        @livewireScripts
        <!--End of Tawk.to Script-->
        @stack('scripts')
    </body>

    </html>
