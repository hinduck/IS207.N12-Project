<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Thêm Mã Giảm Giá
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.coupons') }}" class="btn btn-success pull-right">Danh sách các
                                    mã giảm giá</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCoupon">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Mã Coupon</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Coupon Code..." class="form-control input-md"
                                        wire:model="code" />
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phân loại</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="type">
                                        <option value="">Select...</option>
                                        <option value="fixed">Giảm giá cố định</option>
                                        <option value="percent">Theo Phần Trăm</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Trị Giá giảm</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Value..." class="form-control input-md"
                                        wire:model="value" />
                                    @error('value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Trị Giá đơn hàng</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Cart..." class="form-control input-md"
                                        wire:model="cart_value" />
                                    @error('cart_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Ngày hết hạn</label>
                                <div class="col-md-4" wire:ignore>
                                    <input type="text" id="expiry-date" placeholder="Expiry Date..."
                                        class="form-control input-md" wire:model="expiry_date" />
                                    @error('expiry_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
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

@push('scripts')
    <script>
        $(function() {
            $('#expiry-date').datetimepicker({
                    format: 'Y-MM-DD'
                })
                .on('dp.change', function(ev) {
                    var data = $('#expiry-date').val();
                    @this.set('expiry_date', data);
                });
        });
    </script>
@endpush
