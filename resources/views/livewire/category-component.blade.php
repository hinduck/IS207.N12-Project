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
                <li class="item-link"><span>Danh mục sản phẩm</span></li>
                <li class="item-link"><span>{{ $category_name }}</span></li>
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

                    <h1 class="shop-title">{{ $category_name }}</h1>

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
                                <option value="12" selected="selected">12 đơn vị/trang</option>
                                <option value="16">16 đơn vị/trang</option>
                                <option value="18">18 đơn vị/trang</option>
                                <option value="21">21 đơn vị/trang</option>
                                <option value="24">24 đơn vị/trang</option>
                                <option value="30">30 đơn vị/trang</option>
                                <option value="32">32 đơn vị/trang</option>
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

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @foreach ($products as $product)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}"
                                            title="{{ $product->name }}">
                                            <figure><img src="{{ asset('assets/images/products/') }}/{{ $product->image }}"
                                                    alt="{{ $product->name }}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}"
                                            class="product-name"><span>{{ $product->name }}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">{{ currency_format($product->regular_price) }}</span></div>
                                        <a href="#" class="btn add-to-cart"
                                            wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ currency_format($product->regular_price) }})">Thêm
                                            vào Giỏ Hàng</a>
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
                    <h2 class="widget-title">Tất Cả Danh Mục</h2>
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
                    <h2 class="widget-title">Giá: <span class="text-info">{{ currency_format($min_price) }} -
                        {{ currency_format($max_price) }}</span></h2>
                    <div class="widget-content" style="padding: 10px 5px 40px 5px;">
                        <div id="slider" wire:ignore></div>
                    </div>
                </div><!-- Price-->

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