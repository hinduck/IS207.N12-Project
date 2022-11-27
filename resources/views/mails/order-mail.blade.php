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

    <table style="width: 600px; text-align:right;">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>
                        <img src="{{asset('assets/images/products')}}/{{$item->product->image}}" width="100" alt="">
                    </td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price * $item->quantity}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="font-size: 15px; font-weight: bold; border-top: 1px solid #ccc"></td>
                <td style="font-size: 15px; font-weight: bold; border-top: 1px solid #ccc">Subtotal: ${{$order->subtotal}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight: bold;">Tax: ${{$order->tax}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight: bold;">Shipping: Free Shipping</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 22px; font-weight: bold;">Total: ${{$order->total}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>