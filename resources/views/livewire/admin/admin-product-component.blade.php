<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
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
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3">
                                <h4>Danh sách các sản phẩm</h4>
                            </div>
                            <div class="col-md-6">
                                <button wire:click="export('pdf')" href="{{ route('admin.exportproductpdf') }}"
                                    class="btn btn-danger">
                                    <i class="fa fa-print"></i>
                                    Xuất PDF</button>
                                <a href="{{ route('admin.addproduct') }}" class="btn btn-success">Thêm sản
                                    phẩm mới</a>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Tìm kiếm..."
                                    wire:model="searchTerm">
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên</th>
                                    <th>Tình trạng tồn kho</th>
                                    <th>Giá gốc</th>
                                    <th>Giá khuyến mãi</th>
                                    <th>Danh mục</th>
                                    <th>Ngày nhập</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <input type="checkbox" wire:model="selectedProducts.{{ $product->id }}">
                                        </td>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <img src="{{ asset('assets/images/products') }}/{{ $product->image }}"
                                                width="60">
                                        </td>   
                                        <td>{{ $product->name }}</td>

                                        @if ( $product->stock_status  == 'in_stock')
                                            <td>Còn Hàng</td> 
                                        @else
                                            <td>Hết Hàng</td>
                                        @endif

                                        <td>{{ currency_format($product->regular_price) }}</td>
                                        <td>{{ currency_format($product->sale_price) }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a
                                                href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}">
                                                <i class="fa fa-edit fa-2x text-info"></i>
                                            </a>
                                            <a href="#"
                                                onclick="return confirm('Bạn có chắc muốn XÓA sản phẩm này?') || event.stopImmediatePropagation()"
                                                style="margin-left: 10px;"
                                                wire:click.prevent="deleteProduct({{ $product->id }})">
                                                <i class="fa fa-times fa-2x text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $products->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
