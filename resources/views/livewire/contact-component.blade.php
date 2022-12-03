<div>
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Trang chủ</a></li>
                    <li class="item-link"><span>Liên hệ với chúng tôi</span></li>
                </ul>
            </div>
            <div class="row">
                <div class=" main-content-area">
                    <div class="wrap-contacts ">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="contact-box contact-form">
                                <h2 class="box-title">Để lại lời nhắn tại đây</h2>
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <form name="frm-contact" wire:submit.prevent="sendMessage">

                                    <label for="name">Họ và tên <span>*</span></label>
                                    @error('name')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                    <input type="text" value="" id="name" name="name"
                                        wire:model="name">
                                    
                                    <label for="email">Email <span>*</span></label>
                                    @error('email')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                    <input type="text" value="" id="email" name="email"
                                        wire:model="email">

                                    <label for="phone">Số điện thoại <span>*</span></label>
                                    @error('phone')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                    <input type="text" value="" id="phone" name="phone"
                                        wire:model="phone">

                                    <label for="comment">Lời nhắn của bạn <span>*</span></label>
                                    @error('comment')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                    <textarea name="comment" id="comment" wire:model="comment"></textarea>

                                    <input type="submit" name="ok" value="GỬI">

                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="contact-box contact-info">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.2312403776427!2d106.80086541477223!3d10.870008892258062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527587e9ad5bf%3A0xafa66f9c8be3c91!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiAtIMSQSFFHIFRQLkhDTQ!5e0!3m2!1svi!2s!4v1669711507606!5m2!1svi!2s"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <h2 class="box-title" style="margin-top: 20px">Thông tin liên lạc</h2>
                                <div class="wrap-icon-box">

                                    <div class="icon-box-item">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Email</b>
                                            <p>{{ $setting->email }}</p>
                                        </div>
                                    </div>

                                    <div class="icon-box-item">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Số điện thoại</b>
                                            <p>{{ $setting->phone }}</p>
                                        </div>
                                    </div>

                                    <div class="icon-box-item">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Địa chỉ</b>
                                            <p>{{ $setting->address }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end main products area-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </main>
</div>
