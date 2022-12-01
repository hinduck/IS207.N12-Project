<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-heading">
                    Cài đặt
                </div>
                <div class="panel panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="saveSettings">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Email</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control input-md" placeholder="Email..."
                                    wire:model="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">SĐT</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Phone..."
                                    wire:model="phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">SĐT dự phòng</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Phone 2..."
                                    wire:model="phone2">
                                @error('phone2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Địa chỉ</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Address..."
                                    wire:model="address">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Twitter</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Link Twitter..."
                                    wire:model="twitter">
                                @error('twitter')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Facebook</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Link Facebook..."
                                    wire:model="facebook">
                                @error('facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Pinterest</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Link Pinterest..."
                                    wire:model="pinterest">
                                @error('pinterest')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Instagram</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Link Instagram..."
                                    wire:model="instagram">
                                @error('instagram')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Youtube</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" placeholder="Link Youtube..."
                                    wire:model="youtube">
                                @error('youtube')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
