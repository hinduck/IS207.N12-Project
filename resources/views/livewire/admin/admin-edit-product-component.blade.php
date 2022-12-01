<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Cập nhật sản phẩm
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">Danh sách các
                                    sản phẩm</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="updateProduct">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Tên sản phẩm</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Name..." class="form-control input-md"
                                        wire:model="name" wire:keyup="generateSlug">
                                    @error('name')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Slug..." class="form-control input-md"
                                        wire:model="slug">
                                    @error('slug')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Mô tả</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="short_description" placeholder="Short Description..." wire:model="short_description"></textarea>
                                    @error('short_description')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Mô tả chi tiết</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="description" placeholder="Description..." wire:model="description"></textarea>
                                    @error('description')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Giá gốc</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Regular Price..." class="form-control input-md"
                                        wire:model="regular_price">
                                    @error('regular_price')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Giá khuyến mãi</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sale Price..." class="form-control input-md"
                                        wire:model="sale_price">
                                    @error('sale_price')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Mã nội bộ</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU..." class="form-control input-md"
                                        wire:model="SKU">
                                    @error('SKU')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Tình trạng tồn kho</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control"
                                        wire:model="stock_status">
                                        <option value="in_stock">Còn Hàng</option>
                                        <option value="out_stock">Hết Hàng</option>
                                    </select>
                                    @error('stock_status')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Sản phẩm nổi bật</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="featured">
                                        <option value="0">Không</option>
                                        <option value="1">Có</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Số lượng tồn</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantity..." class="form-control input-md"
                                        wire:model="quantity">
                                    @error('quantity')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Hình ảnh sản phẩm</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="image">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120">
                                    @endif
                                    @error('image')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Hình ảnh trưng bày</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="images" multiple>
                                    @if ($images)
                                        @foreach ($images as $image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120">
                                        @endforeach
                                    @endif
                                    @error('image')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Danh mục sản phẩm</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id"
                                        wire:change="changeSubcategory">
                                        <option value="">Select</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Danh mục phụ</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="sCategory_id">
                                        <option value="0">Select</option>
                                        @foreach ($sCategories as $sCategory)
                                            <option value="{{ $sCategory->id }}">{{ $sCategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sCategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Đặc điểm sản phẩm</label>
                                <div class="col-md-3">
                                    <select class="form-control" wire:model="attr">
                                        <option value="0">Select</option>
                                        @foreach ($p_attributes as $p_attribute)
                                            <option value="{{ $p_attribute->id }}">{{ $p_attribute->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-info"
                                        wire:click.prevent="addAttribute">Thêm</button>
                                </div>
                            </div>

                            @foreach ($inputs as $key => $value)
                                <div class="form-group">
                                    <label for=""
                                        class="col-md-4 control-label">{{ $p_attribute->where('id', $arr_attributes[$key])->first()->name }}</label>
                                    <div class="col-md-3">
                                        <input type="text"
                                            placeholder="{{ $p_attribute->where('id', $arr_attributes[$key])->first()->name }}"
                                            class="form-control input-md"
                                            wire:model="attribute_values.{{ $value }}">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click.prevent="removeAttribute( {{ $key }} )">Loại
                                            bỏ</button>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {
            ClassicEditor
                .create(document.querySelector('#short_description'))
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
