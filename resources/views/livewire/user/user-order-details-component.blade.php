<div class="">
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Chi tiết hóa đơn
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('user.orders') }}" class="btn btn-success pull-right">Hóa đơn của bạn</a>
                                @if ($order->status == 'ordered')
                                    <a href="#" wire:click.prevent="cancelOrder" style="margin-right:20px;"
                                        class="btn btn-warning pull-right">Hủy đơn hàng</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <th>Order ID</th>
                            <td>{{ $order->id }}</td>
                            <th>Ngày đặt hàng</th>
                            <td>{{ $order->created_at }}</td>
                            <th>Trạng thái đơn hàng</th>
                            <td>{{ $order->status }}</td>
                            @if ($order->status == 'delivered')
                                <th>Ngày giao hàng</th>
                                <td>{{ $order->delivered_date }}</td>
                            @elseif($order->status == 'canceled')
                                <th>Ngày hủy đơn</th>
                                <td>{{ $order->canceled_date }}</td>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Chi tiết sản phẩm hóa đơn
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">Tên sản phẩm</h3>
                            <ul class="products-cart">
                                @foreach ($order->orderItems as $item)
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img
                                                    src="{{ asset('assets/images/products') }}/{{ $item->product->image }}"
                                                    alt="{{ $item->product->name }}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product"
                                                href="{{ route('product.details', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                                        </div>
                                        @if ($item->options)
                                            <div class="product-option">
                                                @foreach (unserialize($item->options) as $key => $value)
                                                    <p><b>{{ $key }}: {{ $value }}</b></p>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="price-field produtc-price">
                                            <p class="price">{{ $item->price }}đ</p>
                                        </div>
                                        <div class="quantity">
                                            <h5>{{ $item->quantity }}</h5>
                                        </div>
                                        <div class="price-field sub-total">
                                            <p class="price">{{ $item->price * $item->quantity }}đ</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Chi tiết thanh toán</h4>
                                <p class="summary-info">
                                    <span class="title">Tổng tiền sản phẩm</span>
                                    <b class="index">{{ $order->subtotal }}đ</b>
                                </p>
                                <p class="summary-info">
                                    <span class="title">Thuế</span>
                                    <b class="index">{{ $order->tax }}đ</b>
                                </p>
                                <p class="summary-info">
                                    <span class="title">Phí giao hàng</span>
                                    <b class="index">Free Shipping</b>
                                </p>
                                <p class="summary-info">
                                    <span class="title">Tổng hóa đơn</span>
                                    <b class="index">{{ $order->total }}đ</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Chi tiết hóa đơn
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{ $order->first_name }}</td>
                                <th>Last Name</th>
                                <td>{{ $order->last_name }}</td>
                            </tr>
                            <tr>
                                <th>SĐT</th>
                                <td>{{ $order->mobile }}</td>
                                <th>Email</th>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th>Số nhà - Tổ - Khu Phố</th>
                                <td>{{ $order->line1 }}</td>
                                <th>Tên đường</th>
                                <td>{{ $order->line2 }}</td>
                            </tr>
                            <tr>
                                <th>Tỉnh/Thành Phố</th>
                                <td>{{ $order->city }}</td>
                                <th>Phường/Xã</th>
                                <td>{{ $order->province }}</td>
                            </tr>
                            <tr>
                                <th>Quốc gia</th>
                                <td>{{ $order->country }}</td>
                                <th>ZIP</th>
                                <td>{{ $order->zip_code }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if ($order->is_shipping_different)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Chi tiết vận chuyển
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{ $order->shipping->first_name }}</td>
                                <th>Last Name</th>
                                <td>{{ $order->shipping->last_name }}</td>
                            </tr>
                            <tr>
                                <th>SDT</th>
                                <td>{{ $order->shipping->mobile }}</td>
                                <th>Email</th>
                                <td>{{ $order->shipping->email }}</td>
                            </tr>
                            <tr>
                                <th>Số nhà - Tổ - Khu Phố</th>
                                <td>{{ $order->shipping->line1 }}</td>
                                <th>Tên đường</th>
                                <td>{{ $order->shipping->line2 }}</td>
                            </tr>
                            <tr>
                                <th>Tỉnh/Thành phố</th>
                                <td>{{ $order->shipping->city }}</td>
                                <th>Phường/Xã</th>
                                <td>{{ $order->shipping->province }}</td>
                            </tr>
                            <tr>
                                <th>Quốc gia</th>
                                <td>{{ $order->shipping->country }}</td>
                                <th>ZIP Code</th>
                                <td>{{ $order->shipping->zip_code }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Giao dịch
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Loại hình thanh toán</th>
                                <td>{{ $order->transaction->mode }}</td>
                            </tr>
                            <tr>
                                <th>Trạng thái</th>
                                <td>{{ $order->transaction->status }}</td>
                            </tr>
                            <tr>
                                <th>Ngày giao dịch</th>
                                <td>{{ $order->transaction->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
