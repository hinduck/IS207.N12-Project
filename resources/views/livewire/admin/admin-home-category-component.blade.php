<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Quản lý danh mục trang chủ
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Chọn danh mục</label>
                                <div class="col-md-4" wire:ignore>
                                    <select name="" id="" class="sel_categories form-control"
                                        name="categories[]" multiple="multiple" wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Số lượng sản phẩm</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="numberOfProducts">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">LƯU</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Scripts 2 --}}
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.sel_categories').select2();
            $('.sel_categories').on('change', function(e) {
                var data = $('.sel_categories').select2("val");
                @this.set('selected_categories', data);
            });
        });
    </script>
@endpush
