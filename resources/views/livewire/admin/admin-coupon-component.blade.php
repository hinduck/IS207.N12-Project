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
                            <div class="col-md-4">Danh sách các mã giảm giá</div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.addcoupon') }}" class="btn btn-success pull-right">Thêm mã giảm
                                    giá mới</a>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Search..."
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
                                    <th>ID</th>
                                    <th>Code</th>
                                    <th>Loại mã</th>
                                    <th>Trị giá giảm</th>
                                    <th>Trị giá đơn hàng</th>
                                    <th>Ngày hết hạn</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $coupon->id }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->type }}</td>
                                        @if ($coupon->type == 'fixed')
                                            <td>{{ currency_format($coupon->value) }}</td>
                                        @else
                                            <td>{{ $coupon->value }}%</td>
                                        @endif
                                        <td>{{ $coupon->cart_value }}</td>
                                        <td>{{ $coupon->expiry_date }}</td>
                                        <td>
                                            <a href="{{ route('admin.editcoupon', ['coupon_id' => $coupon->id]) }}">
                                                <i class="fa fa-edit fa-2x"></i>
                                            </a>
                                            <a href="#"
                                                onclick="return confirm('Bạn có chắc chắn muốn XÓA mã giảm giá này?') || event.stopImmediatePropagation()"
                                                style="margin-left: 10px;"
                                                wire:click.prevent="deleteCoupon({{ $coupon->id }})">
                                                <i class="fa fa-times fa-2x text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
