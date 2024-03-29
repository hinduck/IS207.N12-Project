<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        .sub-cat-list {
            list-style: none;
        }

        .sub-cat-list li {
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }

        .sub-link i {
            font-size: 16px;
            margin-left: 16px;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4">Danh sách các đặc điểm</div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.add_attribute') }}" class="btn btn-success pull-right">Thêm đặc
                                    điểm mới</a>
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
                                    <th>Tên thuộc tính</th>
                                    <th>Thời gian tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($p_attributes as $p_attribute)
                                    <tr>
                                        <td>{{ $p_attribute->id }}</td>
                                        <td>{{ $p_attribute->name }}</td>
                                        <td>{{ $p_attribute->created_at }}</td>
                                        <td>
                                            <a
                                                href="{{ route('admin.edit_attribute', ['attribute_id' => $p_attribute->id]) }}">
                                                <i class="fa fa-edit fa-2x"></i>
                                            </a>
                                            <a href="#"
                                                onclick="return confirm('Bạn có chắc chắn muốn XÓA đặc điểm này?') || event.stopImmediatePropagation()"
                                                wire:click.prevent="deleteAttribute( {{ $p_attribute->id }} )"
                                                style="margin-left: 10px;">
                                                <i class="fa fa-times fa-2x text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $p_attributes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
