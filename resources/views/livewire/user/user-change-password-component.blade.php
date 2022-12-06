<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Thay đổi mật khẩu
                    </div>
                    <div class="panel-body">
                        @if (Session::has('password_success'))
                            <div class="alert alert-success" role="alert">{{ Session::get('password_success') }}</div>
                        @endif
                        @if (Session::has('password_error'))
                            <div class="alert alert-danger" role="alert">{{ Session::get('password_error') }}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="changePassword">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Mật khẩu cũ <span
                                        class="text-red-600">*</span></label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="Old Password..." class="form-control input-md"
                                        name="old_password" wire:model="old_password">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Mật khẩu mới <span
                                        class="text-red-600">*</span></label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="New Password..." class="form-control input-md"
                                        name="password" wire:model="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Xác nhận mật khẩu mới <span
                                        class="text-red-600">*</span></label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="Confirm Password..."
                                        class="form-control input-md" name="password_confirmation"
                                        wire:model="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
