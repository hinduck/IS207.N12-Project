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
                            <div class="col-md-4">Danh sách các danh mục</div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">Thêm danh
                                    mục mới</a>
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
                                    <th>Tên danh mục</th>
                                    <th>Slug</th>
                                    <th>Tên danh mục phụ</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <ul class="sub-cat-list">
                                                @foreach ($category->subCategories as $sCategory)
                                                    <li><i class="fa fa-caret-right"></i>{{ $sCategory->name }}
                                                        <a href="{{ route('admin.editcategory', ['category_slug' => $category->slug, 'sCategory_slug' => $sCategory->slug]) }}"
                                                            class="sub-link">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a class="sub-link" href="#"
                                                            onclick="return confirm('Bạn có chắc chắn muốn XÓA danh mục phụ này?') || event.stopImmediatePropagation()"
                                                            wire:click.prevent="deleteSubcategory({{ $sCategory->id }})">
                                                            <i class="fa fa-times text-danger"></i>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}">
                                                <i class="fa fa-edit fa-2x"></i>
                                            </a>
                                            <a href="#"
                                                onclick="return confirm('Bạn có chắc chắn muốn XÓA danh mục này?') || event.stopImmediatePropagation()"
                                                style="margin-left: 10px;"
                                                wire:click.prevent="deleteCategory({{ $category->id }})">
                                                <i class="fa fa-times fa-2x text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
