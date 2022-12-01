<div>
    <footer id="footer">
        <div class="wrap-footer-content footer-style-1">

            <div class="wrap-function-info">
                <div class="container">
                    <ul>
                        <li class="fc-info-item">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Vận chuyển miễn phí</h4>
                                <p class="fc-desc">Trợ giá cho 63 tỉnh thành</p>
                            </div>

                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-recycle" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Đổi trả</h4>
                                <p class="fc-desc">Trong vòng 7 ngày</p>
                            </div>

                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Thanh toán an toàn</h4>
                                <p class="fc-desc">Bảo mật đơn hàng của bạn</p>
                            </div>

                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Hỗ trợ trực tuyến</h4>
                                <p class="fc-desc">Hỗ trợ khách hàng 24/7</p>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
            <!--End function info-->

            <div class="main-footer-content">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="wrap-footer-item">
                                <h3 class="item-header">Thông tin liên hệ</h3>
                                <div class="item-content">
                                    <div class="wrap-contact-detail">
                                        <ul>
                                            <li>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <p class="contact-txt">{{ $setting->address }}</p>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <p class="contact-txt">{{ $setting->phone }}</p>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                <p class="contact-txt">{{ $setting->email }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                            <div class="wrap-footer-item">
                                <h3 class="item-header">HOTLINE</h3>
                                <div class="item-content">
                                    <div class="wrap-hotline-footer">
                                        <span class="desc">Liên hệ đường dây nóng</span>
                                        <b class="phone-number">{{ $setting->phone }}</b>
                                    </div>
                                </div>
                            </div>

                            <div class="wrap-footer-item footer-item-second">
                                <h3 class="item-header">Đăng ký để nhận thông tin mới</h3>
                                <div class="item-content">
                                    <div class="wrap-newletter-footer">
                                        <form action="" class="frm-newletter" id="frm-newletter">
                                            <input type="email" class="input-email" name="email" value=""
                                                placeholder="Nhập email của bạn...">
                                            <a href="/login" class="btn-submit">Đăng ký</a>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
                            <div class="row">
                                <div class="wrap-footer-item twin-item">
                                    <h3 class="item-header">Tài khoản</h3>
                                    <div class="item-content">
                                        <div class="wrap-vertical-nav">
                                            <ul>
                                                <li class="menu-item"><a href="/user/profile" class="link-term">Tài
                                                        khoản của bạn</a></li>
                                                <li class="menu-item"><a href="/cart" class="link-term">Giỏ hàng</a>
                                                </li>
                                                <li class="menu-item"><a href="#" class="link-term">Chương trình
                                                        khuyến mãi</a></li>
                                                <li class="menu-item"><a href="/contact-us" class="link-term">Liên kết
                                                        với chúng tôi</a></li>
                                                <li class="menu-item"><a href="/wishlist" class="link-term">Danh mục yêu
                                                        thích</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-footer-item twin-item">
                                    <h3 class="item-header">Xem thêm thông tin</h3>
                                    <div class="item-content">
                                        <div class="wrap-vertical-nav">
                                            <ul>
                                                <li class="menu-item"><a href="/contact-us" class="link-term" target="_blank">Liên hệ</a>
                                                </li>
                                                <li class="menu-item"><a href="#" class="link-term">Về đầu
                                                        trang</a>
                                                </li>
                                                <li class="menu-item"><a href="https://goo.gl/maps/DzD8FmF4JA3SuYC98" target="_blank" class="link-term">Bản đồ</a>
                                                </li>
                                                <li class="menu-item"><a href="#" class="link-term">Danh mục đặc
                                                        biệt</a></li>
                                                <li class="menu-item"><a href="/user/orders" class="link-term">Lịch
                                                        sử đặt hàng</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="wrap-footer-item">
                                <h3 class="item-header">Liên kết thanh toán</h3>
                                <div class="item-content">
                                    <div class="wrap-list-item wrap-gallery">
                                        <img src="assets/images/payment.png" style="max-width: 260px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="wrap-footer-item">
                                <h3 class="item-header">Mạng lưới xã hội</h3>
                                <div class="item-content">
                                    <div class="wrap-list-item social-network">
                                        <ul>
                                            <li><a href="{{ $setting->twitter }}" class="link-to-item"
                                                    title="twitter"><i class="fa fa-twitter"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ $setting->facebook }}" class="link-to-item"
                                                    title="facebook"><i class="fa fa-facebook"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ $setting->pinterest }}" class="link-to-item"
                                                    title="pinterest"><i class="fa fa-pinterest"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ $setting->instagram }}" class="link-to-item"
                                                    title="instagram"><i class="fa fa-instagram"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ $setting->youtube }}" class="link-to-item"
                                                    title="youtube"><i class="fa fa-youtube"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="wrap-footer-item">
                                <h3 class="item-header">Tải xuống</h3>
                                <div class="item-content">
                                    <div class="wrap-list-item apps-list">
                                        <ul>
                                            <li><a href="#" class="link-to-item"
                                                    title="our application on apple store">
                                                    <figure><img src="assets/images/brands/apple-store.png"
                                                            alt="apple store" width="128" height="36"></figure>
                                                </a></li>
                                            <li><a href="#" class="link-to-item"
                                                    title="our application on google play store">
                                                    <figure><img src="assets/images/brands/google-play-store.png"
                                                            alt="google play store" width="128" height="36">
                                                    </figure>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="wrap-back-link">
                    <div class="container">
                        <div class="back-link-box">
                            <h3 class="backlink-title">Đường dẫn nhanh</h3>
                        </div>
                    </div>
                </div>

            </div>

            <div class="coppy-right-box">
                <div class="container">
                    <div class="coppy-right-item item-left">
                        <p class="coppy-right-text">Copyright © 2022 Bao Thu Food - IS207.N12</p>
                    </div>
                    <div class="coppy-right-item item-right">
                        <div class="wrap-nav horizontal-nav">
                            <ul>
                                <li class="menu-item"><a href="about-us.html" class="link-term">Về chúng tôi</a></li>
                                <li class="menu-item"><a href="privacy-policy.html" class="link-term">Chính sách bảo
                                        mật</a></li>
                                <li class="menu-item"><a href="terms-conditions.html" class="link-term">Điều khoản
                                        dịch vụ</a></li>
                                <li class="menu-item"><a href="return-policy.html" class="link-term">Chính sách hoàn
                                        trả</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </footer>
</div>
