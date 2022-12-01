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
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Đơn đặt hàng của bạn
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
                                    <th>Trạng thái</th>
                                    <th>Ngày đặt hàng</th>
                                    <th colspan="2" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>${{ $order->subtotal }}</td>
                                        <td>${{ $order->discount }}</td>
                                        <td>${{ $order->tax }}</td>
                                        <td>${{ $order->total }}</td>
                                        <td>{{ $order->first_name }}</td>
                                        <td>{{ $order->last_name }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->zip_code }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <a href="{{ route('user.orderdetails', ['order_id' => $order->id]) }}"
                                                class="btn btn-info btn-sm">
                                                Chi tiết
                                            </a>
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
