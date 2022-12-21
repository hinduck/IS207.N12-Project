<main id="main" class="main-site">
    <style>
        .regprice {
            font-weight: 300;
            font-size: 13px !important;
            color: #aaaaaa !important;
            text-decoration: line-through;
            padding-left: 10px;
        }
    </style>

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
                <li class="item-link"><span>Chi tiết sản phẩm</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery" wire:ignore>
                            <ul class="slides">
                                <li data-thumb="{{ asset('assets/images/products') }}/{{ $product->image }}">
                                    <img src="{{ asset('assets/images/products') }}/{{ $product->image }}"
                                        alt="{{ $product->name }}" />
                                </li>
                                @php
                                    $images = explode(',', $product->images);
                                @endphp
                                @foreach ($images as $image)
                                    @if ($image)
                                        <li data-thumb="{{ asset('assets/images/products') }}/{{ $image }}">
                                            <img src="{{ asset('assets/images/products') }}/{{ $image }}"
                                                alt="{{ $product->name }}" />
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <div class="product-rating">
                            <style>
                                .color-gray {
                                    color: #e6e6e6 !important;
                                }
                            </style>
                            @php
                                $avg_rating = 0;
                            @endphp
                            @foreach ($product->orderItems->where('rstatus', 1) as $orderItem)
                                @php
                                    $avg_rating += $orderItem->review->rating;
                                @endphp
                            @endforeach
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $avg_rating)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                @endif
                            @endfor
                            <a href="#"
                                class="count-review">({{ $product->orderItems->where('rstatus', 1)->count() }}
                                review)</a>
                        </div>
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <div class="short-desc">
                            {!! $product->short_description !!}
                        </div>
                        @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                            <div class="wrap-price">
                                <span class="product-price">{{ currency_format($product->sale_price) }}</span>
                                <del>
                                    <span
                                        class="product-price regprice">{{ currency_format($product->regular_price) }}</span>
                                </del>
                            </div>
                        @else
                            <div class="wrap-price"><span
                                    class="product-price">{{ currency_format($product->regular_price) }}</span>
                            </div>
                        @endif
                        <div class="stock-info in-stock">
                            <p class="availability">Tình trạng:
                                @if ($product->stock_status === 'in_stock')
                                    <b>Còn Hàng</b>
                                @else
                                    <b>Hết Hàng</b>
                                @endif
                            </p>
                        </div>

                        <div class="">
                            @foreach ($product->attributeValues->unique('product_attribute_id') as $attr_val)
                                <div class="row" style="margin-top: 20px">
                                    <div class="col-xs-2">
                                        <p>{{ $attr_val->productAttribute->name }}</p>
                                    </div>
                                    <div class="col-xs-10">
                                        <select name="" id="" class="form-control" style="width: 200px;"
                                            wire:model="select_att.{{ $attr_val->productAttribute->name }}">
                                            @foreach ($attr_val->productAttribute->attributeValues->where('product_id', $product->id) as $p_attr_val)
                                                <option value="{{ $p_attr_val->value }}">{{ $p_attr_val->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="quantity" style="margin-top: 10px;">
                            <span>Số lượng:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120"
                                    pattern="[0-9]*" wire:model="qty">
                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity"></a>
                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity"></a>
                            </div>
                        </div>

                        <div class="wrap-butons">
                            @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                <a href="#" class="btn add-to-cart"
                                    wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price }})">Thêm
                                    vào Giỏ Hàng</a>
                            @else
                                <a href="#" class="btn add-to-cart"
                                    wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})">Thêm
                                    vào Giỏ Hàng</a>
                            @endif
                            <div class="wrap-btn">
                                <a href="#" class="btn btn-wishlist"
                                    wire:click.prevent="addToWishlist({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})">Thêm
                                    vào Yêu Thích</a>
                            </div>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">Mô tả</a>
                            <a href="#review" class="tab-control-item">Đánh giá</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                {!! $product->description !!}
                            </div>
                            <div class="tab-content-item " id="review">

                                <div class="wrap-review-form">
                                    <style>
                                        .width-0-percent {
                                            width: 0%;
                                        }

                                        .width-20-percent {
                                            width: 20%;
                                        }

                                        .width-40-percent {
                                            width: 40%;
                                        }

                                        .width-60-percent {
                                            width: 60%;
                                        }

                                        .width-80-percent {
                                            width: 80%;
                                        }

                                        .width-100-percent {
                                            width: 100%;
                                        }
                                    </style>
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">
                                            {{ $product->orderItems->where('rstatus', 1)->count() }} đánh giá
                                            <span>cho sản phẩm <b class="text-red-600">{{ $product->name }}</b></span>
                                        </h2>
                                        <ol class="commentlist">
                                            @foreach ($product->orderItems->where('rstatus', 1) as $orderItem)
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                                    id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">
                                                        @if ($orderItem->order->user->image)
                                                            <img alt="{{ $orderItem->order->user->name }}"
                                                                src="{{ asset('assets/images/profile') }}/{{ $orderItem->order->user->image }}"
                                                                height="70" width="70">
                                                        @else
                                                            <img alt="{{ $orderItem->order->user->name }}"
                                                                src="{{ asset('assets/images/profile/default.png') }}"
                                                                height="70" width="70">
                                                        @endif
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <span
                                                                    class="width-{{ $orderItem->review->rating * 20 }}-percent">Rated
                                                                    <strong
                                                                        class="rating">{{ $orderItem->review->rating }}</strong>
                                                                    out of 5</span>
                                                            </div>
                                                            <p class="meta">
                                                                <strong
                                                                    class="woocommerce-review__author">{{ $orderItem->order->user->name }}</strong>
                                                                <span class="woocommerce-review__dash">–</span>
                                                                <time class="woocommerce-review__published-date"
                                                                    datetime="2008-02-14 20:00">{{ Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A') }}</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{ $orderItem->review->comment }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div><!-- #comments -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                {{-- <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Giao hàng miễn phí</b>
                                        <span class="subtitle">Trợ giá 0 đồng</span>
                                        <p class="desc">Giao hàng tận nơi với mức giá 0 đồng</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Ưu đãi đặc biệt</b>
                                        <span class="subtitle">Nhận ngay ưu đãi</span>
                                        <p class="desc">Chương trình khuyến mãi vẫn đang diễn ra</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Hoàn trả sản phẩm</b>
                                        <span class="subtitle">Trong vòng 3 ngày</span>
                                        <p class="desc">Áp dụng đối với sản phẩm đóng hộp (sản phẩm tươi sống trong
                                            ngày)</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget--> --}}
                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Phổ biến</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($popular_products as $p_product)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{ route('product.details', ['slug' => $p_product->slug]) }}"
                                                title="{{ $p_product->name }}">
                                                <figure><img
                                                        src="{{ asset('assets/images/products/') }}/{{ $p_product->image }}"
                                                        alt="{{ $p_product->name }}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product.details', ['slug' => $p_product->slug]) }}"
                                                class="product-name"><span>{{ $p_product->name }}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">{{ currency_format($p_product->regular_price) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--end sitebar-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Đánh giá cao</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                            data-loop="false" data-nav="true" data-dots="false"
                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                            @foreach ($related_products as $r_product)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug' => $r_product->slug]) }}"
                                            title="{{ $r_product->name }}">
                                            <figure><img
                                                    src="{{ asset('assets/images/products') }}//{{ $r_product->image }}"
                                                    width="214" height="214" alt="{{ $r_product->name }}">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">Mới</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">Chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details', ['slug' => $r_product->slug]) }}"
                                            class="product-name"><span>{{ $r_product->name }}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">{{ currency_format($r_product->regular_price) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--End wrap-products-->
                </div>
            </div>

        </div>
        <!--end row-->

    </div>
    <!--end container-->

</main>
