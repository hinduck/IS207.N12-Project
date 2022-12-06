<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <style>
        #product {
            font-family: 'Times New Roman', Times, serif;
            border-collapse: collapse;
            width: 100%;
        }

        #product td,
        #product th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #product tr:nth-child(even) {
            background-color: rgb(24, 174, 154);
        }
        #product th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(254, 145, 3);
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="">
        <table class="table table-striped" id="product">
            @if ($products->count() > 0)
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên sản phẩm</th>
                        <th>Tình trạng tồn kho</th>
                        <th>Giá gốc</th>
                        <th>Giá khuyến mãi</th>
                        <th>Danh mục</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stock_status }}</td>
                            <td>{{ $product->regular_price }}</td>
                            <td>{{ $product->sale_price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    <h4>Không có sản phẩm tồn tại</h4>
            @endif

            </tbody>
        </table>

    </div>
</body>

</html>
