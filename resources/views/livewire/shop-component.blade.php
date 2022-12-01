<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Cửa hàng</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{ 'assets/images/shop-banner.jpg' }}" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Digital & Electronics</h1>

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
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>Danh
                                sách</a>
                        </div>

                    </div>

                </div>
                <!--end wrap shop control-->

                <style>
                    .product-wishlist {
                        position: absolute;
                        top: 10%;
                        left: 0;
                        z-index: 99;
                        right: 30px;
                        padding-top: 0;
                        text-align: right;
                        border-radius: 0 0 0 5px;
                    }

                    .product-wishlist .fa {
                        color: #cbcbcb;
                        font-size: 32px;
                    }

                    .product-wishlist .fa:hover {
                        color: #ff4004;
                    }

                    .fill-heart {
                        color: #ff4004 !important;
                    }
                </style>

                <div class="row">
                    <ul class="product-list grid-products equal-container">
                        @php
                            $wproducts = Cart::instance('wishlist')
                                ->content()
                                ->pluck('id');
                        @endphp

                        @foreach ($products as $product)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}"
                                            title="{{ $product->name }}">
                                            <figure><img src="{{ 'assets/images/products' }}/{{ $product->image }}"
                                                    alt="{{ $product->name }}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}"
                                            class="product-name"><span>{{ $product->name }}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">${{ $product->regular_price }}</span></div>
                                        <a href="#" class="btn add-to-cart"
                                            wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})">Add
                                            To Cart</a>
                                        <div class="product-wishlist">
                                            @if ($wproducts->contains($product->id))
                                                <a href="#"
                                                    wire:click.prevent="removeFromWishlist({{ $product->id }})"><i
                                                        class="fa fa-heart fill-heart"></i></a>
                                            @else
                                                <a href="#"
                                                    wire:click.prevent="addToWishlist({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})"><i
                                                        class="fa fa-heart"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

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
                                <li
                                    class="category-item {{ count($category->subCategories) > 0 ? 'has-child-cate' : '' }}">
                                    <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}"
                                        class="cate-link">{{ $category->name }}</a>
                                    @if (count($category->subCategories) > 0)
                                        <span class="toggle-control">+</span>
                                        <ul class="sub-cate">
                                            @foreach ($category->subCategories as $subCategory)
                                                <li class="category-item">
                                                    <a href="{{ route('product.category', ['category_slug' => $category->slug, 'sCategory_slug' => $subCategory->slug]) }}"
                                                        class="cat-link"><i
                                                            class="fa fa-caret-right"></i>{{ $subCategory->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Giá: <span class="text-info">${{ $min_price }} -
                            ${{ $max_price }}</span></h2>
                    <div class="widget-content" style="padding: 10px 5px 40px 5px;">
                        <div id="slider" wire:ignore></div>
                    </div>
                </div><!-- Price-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ 'assets/images/products/digital_01.jpg' }}"
                                                    alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ 'assets/images/products/digital_17.jpg' }}"
                                                    alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ 'assets/images/products/digital_18.jpg' }}"
                                                    alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ 'assets/images/products/digital_20.jpg' }}"
                                                    alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div><!-- brand widget-->

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
            start: [1, 1000],
            connect: true,
            range: {
                'min': 1,
                'max': 1000
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
