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
                            <div class="col-md-6">All Categories</div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">Add New Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Sub Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <ul class="sub-cat-list">
                                            @foreach($category->subCategories as $sCategory)
                                            <li><i class="fa fa-caret-right"></i>{{$sCategory->name}}
                                                <a href="{{route('admin.editcategory', ['category_slug' => $category->slug, 'sCategory_slug' => $sCategory->slug])}}" class="sub-link">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="sub-link" href="#" onclick="return confirm('Are you sure you want to delete this Subcategory?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSubcategory({{$sCategory->id}})">
                                                    <i class="fa fa-times text-danger"></i>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.editcategory', ['category_slug' => $category->slug])}}">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        <a href="#" onclick="return confirm('Are you sure to Delete this Category?') || event.stopImmediatePropagation()" style="margin-left: 10px;" wire:click.prevent="deleteCategory({{$category->id}})">
                                            <i class="fa fa-times fa-2x text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
