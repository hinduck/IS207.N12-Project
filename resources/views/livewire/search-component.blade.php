<main id="main" class="main-site left-sidebar">

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
                <li class="item-link"><a href="#" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Tìm kiếm</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{ ('assets/images/shop-banner.jpg') }}" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Danh mục sản phẩm</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" wire:model="sorting">
                                <option value="default" selected="selected">Mặc định</option>
                                <option value="date">Sắp xếp theo ngày ra mắt</option>
                                <option value="price">Sắp xếp theo giá: thấp đến cao</option>
                                <option value="price-desc">Sắp xếp theo giá: cao đến thấp</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model="pagesize">
                                <option value="12" selected="selected">12 sản phẩm/trang</option>
                                <option value="16">16 sản phẩm/trang</option>
                                <option value="18">18 sản phẩm/trang</option>
                                <option value="21">21 sản phẩm/trang</option>
                                <option value="24">24 sản phẩm/trang</option>
                                <option value="30">30 sản phẩm/trang</option>
                                <option value="32">32 sản phẩm/trang</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Lưới</a>
                            <a href="#" class="list-mode display-mode"><i class="fa fa-th-list"></i>Danh
                                sách</a>
                        </div>

                    </div>

                </div>
                <!--end wrap shop control-->

                @if ($products->count() > 0)
                    <div class="row">

                        <ul class="product-list grid-products equal-container">
                            @foreach ($products as $product)
                                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}"
                                                title="{{ $product->name }}">
                                                <figure><img
                                                        src="{{ 'assets/images/products' }}/{{ $product->image }}"
                                                        alt="{{ $product->name }}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}"
                                                class="product-name"><span>{{ $product->name }}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">{{ currency_format($product->regular_price) }}</span></div>
                                            <a href="#" class="btn add-to-cart"
                                                wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})">
                                                <i class="fa fa-shopping-cart" style="margin-right: 10px;"></i>
                                                Thêm vào Giỏ Hàng
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="alert alert-warning" style="padding-top: 30px;">
                        Không tìm thấy sản phẩm phù hợp
                    </div>
                @endif

                <div class="wrap-pagination-info">
                    {{ $products->links() }}
                </div>
            </div>
            <!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">Danh mục sản phẩm</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach ($categories as $category)
                                <li class="category-item">
                                    <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}"
                                        class="cate-link">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Giá:
                        <span class="text-info">{{ currency_format($min_price) }} -
                            {{ currency_format($max_price) }}
                        </span>
                    </h2>
                    <div class="widget-content" style="padding:10px 5px 40px 5px;">
                        <div id="slider" wire:ignore></div>
                    </div>
                </div><!-- Price-->

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
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <!--end sitebar-->

        </div>
        <!--end row-->

    </div>
    <!--end container-->

</main>

@push('scripts')
    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider, {
            start: [1000, 999999],
            connect: true,
            range: {
                'min': 1000,
                'max': 999999
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4
            }
        });

        slider.noUiSlider.on('update', function(value) {
            @this.set('min_price', value[0]);
            @this.set('max_price', value[1]);
        });
    </script>
@endpush
