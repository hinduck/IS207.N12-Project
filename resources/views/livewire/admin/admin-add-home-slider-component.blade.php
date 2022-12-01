<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">Thêm trang chiếu</div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.homeslider') }}" class="btn btn-success pull-right">Danh sách
                                    các trang chiếu</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="addSlide">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">
                                    Tiêu đề
                                </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Title..." class="form-control input-md"
                                        wire:model="title">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">
                                    Tiêu đề phụ
                                </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Subtitle..." class="form-control input-md"
                                        wire:model="subtitle">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">
                                    Giá
                                </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Price..." class="form-control input-md"
                                        wire:model="price">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">
                                    Đường dẫn
                                </label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Link..." class="form-control input-md"
                                        wire:model="link">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">
                                    Banner
                                </label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="image">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120" alt="">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">
                                    Trạng thái trang chiếu
                                </label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="status">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Kích hoạt</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">XÁC NHẬN</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
