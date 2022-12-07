<main id="main" class="main-site">

    <style>
        .summary-item .row-in-form input[type="password"],
        .summary-item .row-in-form input[type="text"],
        .summary-item .row-in-form input[type="tel"] {
            font-size: 13px;
            line-height: 19px;
            display: inline-block;
            height: 43px;
            padding: 2px 20px;
            max-width: 300px;
            width: 100%;
            border: 1px solid #e6e6e6;
        }
    </style>

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Xác nhận thanh toán</span></li>
            </ul>
        </div>
        <div class="main-content-area">
            <form action="" wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Địa chỉ đơn hàng</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">First name <span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your first name..."
                                        wire:model="first_name">
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">Last name <span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name..."
                                        wire:model="last_name">
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Địa chỉ Email <span>*</span></label>
                                    <input type="email" name="email" value="" placeholder="Type your email..."
                                        wire:model="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Số Điện Thoại <span>*</span></label>
                                    <input type="number" name="phone" value=""
                                        placeholder="Phone number (10 digits)" pattern="^[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                        required wire:model="mobile">
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Số nhà - Tổ - Khu Phố</label>
                                    <input type="text" name="add" value=""
                                        placeholder="Quarter and Sub-quarter" wire:model="line1">
                                    @error('line1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Tên Đường</label>
                                    <input type="text" name="add" value=""
                                        placeholder="Street at apartment number" wire:model="line2">
                                    @error('line2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Phường/Xã <span>*</span></label>
                                    <input type="text" name="province" value="" placeholder="Your province"
                                        wire:model="province">
                                    @error('province')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Tỉnh/Thành Phố <span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="Your City"
                                        wire:model="city">
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Quốc gia <span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="Your country"
                                        wire:model="country">
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP</label>
                                    <input ode" type="number" name="zip-code" value=""
                                        placeholder="Your postal code" wire:model="zip_code">
                                    @error('zip_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form fill-wife">
                                    <label class="checkbox-field">
                                        <input name="different-add" id="different-add" value="1"
                                            type="checkbox" wire:model="shipToDifferent">
                                        <span>Bạn muốn giao hàng đến <b class="text-red-600">ĐỊA CHỈ KHÁC</b> ?</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>

                    @if ($shipToDifferent > 0)
                        <div class="col-md-12">
                            <div class="wrap-address-billing">
                                <h3 class="box-title">Địa chỉ giao hàng</h3>
                                <div class="billing-address">
                                    <p class="row-in-form">
                                        <label for="fname">First name <span>*</span></label>
                                        <input type="text" name="fname" value=""
                                            placeholder="Your first name..." wire:model="first_name">
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="lname">Last name <span>*</span></label>
                                        <input type="text" name="lname" value=""
                                            placeholder="Your last name..." wire:model="last_name">
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="email">Địa chỉ Email <span>*</span></label>
                                        <input type="email" name="email" value=""
                                            placeholder="Type your email..." wire:model="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">Số Điện Thoại <span>*</span></label>
                                        <input type="number" name="phone" value=""
                                            placeholder="Phone number (10 digits)"
                                            pattern="^[0-9]{3}-[0-9]{3}-[0-9]{4}" required wire:model="mobile">
                                        @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Số nhà - Tổ - Khu Phố</label>
                                        <input type="text" name="add" value=""
                                            placeholder="Quarter and Sub-quarter" wire:model="line1">
                                        @error('line1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Tên Đường</label>
                                        <input type="text" name="add" value=""
                                            placeholder="Street at apartment number" wire:model="line2">
                                        @error('line2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="city">Phường/Xã <span>*</span></label>
                                        <input type="text" name="province" value=""
                                            placeholder="Your province" wire:model="province">
                                        @error('province')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="city">Tỉnh/Thành Phố <span>*</span></label>
                                        <input type="text" name="city" value="" placeholder="Your City"
                                            wire:model="city">
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Quốc gia <span>*</span></label>
                                        <input type="text" name="country" value=""
                                            placeholder="Your country" wire:model="country">
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Postcode / ZIP</label>
                                        <input ode" type="number" name="zip-code" value=""
                                            placeholder="Your postal code" wire:model="zip_code">
                                        @error('zip_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Phương thức thanh toán</h4>
                        @if ($payment_mode == 'card')
                            <div class="wrap-address-billing">
                                @if (Session::has('stripe_error'))
                                    <div class="alert alert-danger" role="alert">{{ Session::get('stripe_error') }}
                                    </div>
                                @endif
                                <p class="row-in-form">
                                    <label for="card-no">Số tài khoản</label>
                                    <input type="text" name="card-no" value=""
                                        placeholder="Card Number (16 digits)" wire:model="card_no">
                                    @error('card_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>

                                <p class="row-in-form">
                                    <label for="card-no">Tháng hết hạn</label>
                                    <input type="text" name="exp-month" value="" placeholder="MM"
                                        wire:model="exp_month">
                                    @error('exp_month')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="card-no">Năm hết hạn</label>
                                    <input type="text" name="exp-year" value="" placeholder="YYYY"
                                        wire:model="exp_year">
                                    @error('exp_year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="card-no">Mã xác minh</label>
                                    <input type="password" name="card-no" value="" placeholder="CVC"
                                        wire:model="cvc">
                                    @error('cvc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p>
                                    <label for="card-no"><span class="text-primary">hoặc</span> QUÉT mã QR bên
                                        dưới:</label>
                                    <img src="{{ asset('assets/images/qr-code.png') }}" alt="">
                                </p>
                            </div>
                        @endif

                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-bank" value="cod" type="radio"
                                    wire:model="payment_mode">
                                <span>Thanh toán khi nhận hàng</span>
                                <span class="payment-desc">Đặt hàng ngay - thanh toán khi nhận hàng</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-visa" value="card" type="radio"
                                    wire:model="payment_mode">
                                <span>Thẻ tín dụng / Thẻ ghi nợ</span>
                                <span class="payment-desc">Vui lòng điền đầy đủ thông tin để xác nhận thanh toán</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-paypal" value="paypal"
                                    type="radio" wire:model="payment_mode">
                                <span>Paypal</span>
                                <span class="payment-desc">You can pay with your credit</span>
                                <span class="payment-desc">card if you don't have a paypal account</span>
                            </label>
                            @error('payment_mode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if (Session::has('checkout'))
                            <p class="summary-info grand-total">
                                <span>TỔNG ĐƠN HÀNG</span>
                                <span class="grand-total-price">{{ Session::get('checkout')['total'] }}đ</span>
                            </p>
                        @endif

                        @if ($errors->isEmpty())
                            <div wire:ignore id="processing"
                                style="font-size: 22px; margin-bottom:20px; padding-left: 37px; color: green; display: none;">
                                <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                <span>Loading...</span>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-medium">ĐẶT HÀNG</button>
                    </div>

                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Phương thức vận chuyển</h4>
                        <p class="summary-info"><span class="title"><b>CÔNG TY CỔ PHẦN GIAO HÀNG TIẾT KIỆM</b></span></p>
                        <a href="https://giaohangtietkiem.vn/" target="_blank"><img
                                src="{{ asset('assets/images/brands/Logo-GHTK.png') }}" alt=""></a>
                        <p class="summary-info"><h3 class="title">Trợ giá <b class="text-red-600">0 đồng</b></h3></p>

                    </div>
                </div>
            </form>

        </div>
        <!--end main content area-->
    </div>
    <!--end container-->

</main>
