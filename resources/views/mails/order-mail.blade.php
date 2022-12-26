<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đơn đặt hàng</title>
</head>
<body>
    <p>Kính chào {{$order->first_name}} {{$order->last_name}},</p>
    <p>Hóa đơn của bạn đã <b class="text-danger">HOÀN TẤT</b>, chúng tôi sẽ giao hàng trong thời gian sớm nhất.</p> <br><br>
    <p>BaoThuFood xin chân thành cảm ơn!</p>
    <p>Trân trọng.</p>

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

    <table style="width: 600px; text-align:right;">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{ currency_format($item->price)}}</td>
                    <td>{{ currency_format($item->price * $item->quantity)}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="font-size: 15px; font-weight: bold; border-top: 1px solid #ccc"></td>
                <td style="font-size: 15px; font-weight: bold; border-top: 1px solid #ccc">Tổng giá trị sản phẩm: {{ currency_format($order->subtotal)}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight: bold;">Thuế: {{ currency_format($order->tax)}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight: bold;">Phí vận chuyển: Miễn phí</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 22px; font-weight: bold;">Tổng hóa đơn: {{ currency_format($order->total)}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>