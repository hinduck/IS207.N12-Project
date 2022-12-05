<table style='width:100%; border:1px solid black'>
    @if (count($products) > 0)
        <thead>
            <tr style='border:1px solid black'>
                <th>Id</th>
                <th>Tên sản phẩm</th>
                <th>Stock Status</th>
                <th>Regular Price</th>
                <th>Sale Price</th>
                <th>Category</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr style='border:1px solid black'>
                    <td style='text-align: center;border:1px solid black;border-collapse:collapse;'>
                        {{ ++$key }}</td>
                    <td style='text-align: center;border:1px solid black;border-collapse:collapse;'>
                        {{ $product->name }}
                    </td>
                    <td style='text-align: center;border:1px solid black;border-collapse:collapse;'>
                        {{ $product->stock_status }}
                    </td>
                    <td style='text-align: center;border:1px solid black;border-collapse:collapse;'>
                        {{ $product->regular_price }}
                    </td>
                    <td style='text-align: center;border:1px solid black;border-collapse:collapse;'>
                        {{ $product->sale_price }}
                    </td>
                    <td style='text-align: center;border:1px solid black;border-collapse:collapse;'>
                        {{ $product->category->name }}
                    </td>
                    <td style='text-align: center;border:1px solid black;border-collapse:collapse;'>
                        {{ $product->created_at }}
                    </td>

                </tr>
            @endforeach
    @else
        <h4>Không có sản phẩm tồn tại</h4>
    @endif

    </tbody>
</table>
