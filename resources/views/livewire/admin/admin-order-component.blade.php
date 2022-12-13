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
                            <div class="col-md-6">Danh sách các đơn hàng</div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Search..."
                                    wire:model="searchTerm">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('order_message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>OrderID</th>
                                    <th>Tổng tiền sản phẩm</th>
                                    <th>Chiết khấu</th>
                                    <th>Thuế</th>
                                    <th>Tổng hóa đơn</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>SĐT</th>
                                    <th>Email</th>
                                    <th>ZIP</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th colspan="2" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ currency_format($order->subtotal) }}</td>
                                        <td>{{ currency_format($order->discount) }}</td>
                                        <td>{{ currency_format($order->tax) }}</td>
                                        <td>{{ currency_format($order->total) }}</td>
                                        <td>{{ $order->first_name }}</td>
                                        <td>{{ $order->last_name }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->zip_code }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.orderdetails', ['order_id' => $order->id]) }}"
                                                class="btn btn-info btn-sm">
                                                Chi tiết
                                            </a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                                    data-toggle="dropdown">Trạng thái
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#"
                                                            wire:click="updateOrderStatus({{ $order->id }}, 'delivered')">Đã
                                                            giao hàng</a></li>
                                                    <li><a href="#"
                                                            wire:click="updateOrderStatus({{ $order->id }}, 'canceled')">Đã
                                                            hủy</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
