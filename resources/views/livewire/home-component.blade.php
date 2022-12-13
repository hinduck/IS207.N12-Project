<main id="main">
    <div class="container">
        @php
            if (!function_exists('currency_format')) {
                function currency_format($number, $suffix = 'đ')
                {
                    if (!empty($number)) {
                        return number_format($number, 0, ',', '.') . "{$suffix}";
                    }
                }
            }
        @endphp
        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                data-dots="false">
                @foreach ($sliders as $slider)
                    <div class="item-slide">
                        <img src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}" alt=""
                            class="img-slide">
                        <div class="slide-info slide-1">
                            <h2 class="f-title"> <b>{{ $slider->title }}</b></h2>
                            <span class="subtitle">{{ $slider->subtitle }}</span>
                            <p class="sale-info">Only price: <span class="price">{{ $slider->price }}</span></p>
                            <a href="{{ $slider->link }}" class="btn-link">Vào cửa hàng</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="/shop" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/home-1-banner-1.jpg') }}" alt="" width="580"
                            height="190"></figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="/shop" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/home-1-banner-2.jpg') }}" alt="" width="580"
                            height="190"></figure>
                </a>
            </div>
        </div>

        <!--On Sale-->
        @if ($sproducts->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
            {{-- @if ($sproducts->count() > 0) --}}
            <div class="wrap-show-advance-info-box style-1 has-countdown">
                <h3 class="title-box">Đang khuyến mãi</h3>
                <div class="wrap-countdown mercado-countdown"
                    data-expire="{{ Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s') }}"></div>
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                    data-loop="false" data-nav="true" data-dots="false"
                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                    @foreach ($sproducts as $sproduct)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product.details', ['slug' => $sproduct->slug]) }}"
                                    title="{{ $sproduct->name }}">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $sproduct->image }}"
                                            width="800" height="800"
                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('product.details', ['slug' => $sproduct->slug]) }}"
                                    class="product-name"><span>{{ $sproduct->name }}</span></a>
                                <div class="wrap-price">
                                    <ins>
                                        <p class="product-price">{{ currency_format($sproduct->sale_price) }}</p>
                                    </ins>
                                    <del>
                                        <p class="product-price">{{ currency_format($sproduct->regular_price) }}</p>
                                    </del>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Sản phẩm mới nhất</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/digital-electronic-banner.jpg') }}" width="1170"
                            height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($lproducts as $lproduct)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('product.details', ['slug' => $lproduct->slug]) }}"
                                                title="{{ $lproduct->name }}">
                                                <figure><img
                                                        src="{{ asset('assets/images/products') }}/{{ $lproduct->image }}"
                                                        width="800" height="800" alt="{{ $lproduct->name }}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product.details', ['slug' => $lproduct->slug]) }}"
                                                class="product-name"><span>{{ $lproduct->name }}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">{{ currency_format($lproduct->regular_price) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Danh mục sản phẩm</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/fashion-accesories-banner.jpg') }}" width="1170"
                            height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        @foreach ($categories as $key => $category)
                            <a href="#category_{{ $category->id }}"
                                class="tab-control-item {{ $key == 0 ? 'active' : '' }}">{{ $category->name }}</a>
                        @endforeach
                    </div>

                    <div class="tab-contents">
                        @foreach ($categories as $key => $category)
                            <div class="tab-content-item {{ $key == 0 ? 'active' : '' }}"
                                id="category_{{ $category->id }}">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    @php
                                        $cat_products = DB::table('products')
                                            ->where('category_id', $category->id)
                                            ->get()
                                            ->take($no_of_products);
                                    @endphp

                                    @foreach ($cat_products as $cat_product)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{ route('product.details', ['slug' => $cat_product->slug]) }}"
                                                    title="{{ $cat_product->name }}">
                                                    <figure><img
                                                            src="{{ asset('assets/images/products') }}/{{ $cat_product->image }}"
                                                            width="800" height="800"
                                                            alt="{{ $cat_product->name }}"></figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('product.details', ['slug' => $cat_product->slug]) }}"
                                                    class="product-name"><span>{{ $cat_product->name }}</span></a>
                                                <div class="wrap-price"><span
                                                        class="product-price">{{ currency_format($cat_product->regular_price) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
