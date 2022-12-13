<main id="main" class="main-site left-sidebar">
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
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Danh mục yêu thích</span></li>
            </ul>
        </div>

        <style>
            .product-wish {
                position: absolute;
                top: 10%;
                left: 0;
                z-index: 99;
                right: 30px;
                text-align: right;
                padding-top: 0;
            }

            .product-wish .fa {
                color: #cbcbcb;
                font-size: 32px;
            }

            .product-wish .fa:hover {
                color: #ff4004;
            }

            .fill-heart {
                color: #ff4004 !important;
            }
        </style>

        <div class="row">
            @if (Cart::instance('wishlist')->content()->count() > 0)
                <ul class="product-list grid-products equal-container">
                    @foreach (Cart::instance('wishlist')->content() as $item)
                        <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}"
                                        title="{{ $item->model->name }}">
                                        <figure><img
                                                src="{{ asset('assets/images/products') }}/{{ $item->model->image }}"
                                                alt="{{ $item->model->name }}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}"
                                        class="product-name"><span>{{ $item->model->name }}</span></a>
                                    <div class="wrap-price"><span
                                            class="product-price">{{ currency_format($item->model->regular_price) }}</span>
                                    </div>
                                    <a href="#" class="btn add-to-cart"
                                        wire:click.prevent="moveProductFromWishlistToCart('{{ $item->rowID }}')">Thêm
                                        vào Giỏ Hàng</a>
                                    <div class="product-wish">
                                        <a href="#"
                                            wire:click.prevent="removeFromWishlist({{ $item->model->id }})"><i
                                                class="fa fa-heart fill-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <h3 class="text-red-600"><strong>KHÔNG CÓ sản phẩm nào trong danh mục yêu thích!</strong></h3>
            @endif
        </div>
    </div>
</main>
