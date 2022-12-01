<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cập nhật hồ sơ
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form action="" wire:submit.prevent="updateProfile">
                        <div class="col-md-4">
                            @if ($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}" width="100%" />
                            @elseif($image)
                                <img src="{{ asset('assets/images/profile') }}/{{ $image }}" width="100%"
                                    alt="">
                            @else
                                <img src="{{ asset('assets/images/profile/default.png') }}" width="100%"
                                    alt="">
                            @endif
                            <input type="file" class="form-control" wire:model="newImage">
                        </div>
                        <div class="col-md-8">
                            <p><b>Họ và tên: </b><input type="text" class="form-control" wire:model="name"></p>
                            <p><b>Email: </b>{{ $email }}</p>
                            <p><b>Số điện thoại: </b><input type="text" class="form-control" wire:model="mobile"></p>
                            <hr>
                            <p><b>Số nhà - Tổ - Khu phố: </b><input type="text" class="form-control"
                                    wire:model="line1"></p>
                            <p><b>Tên đường: </b><input type="text" class="form-control" wire:model="line2"></p>
                            <p><b>Phường/Xã: </b><input type="text" class="form-control" wire:model="province"></p>
                            <p><b>Tỉnh/Thành Phố: </b><input type="text" class="form-control" wire:model="city"></p>
                            <p><b>Quốc gia: </b><input type="text" class="form-control" wire:model="country"></p>
                            <p><b>ZIP Code: </b><input type="text" class="form-control" wire:model="zip_code"></p>
                            <button class="btn btn-info pull-right" type="submit">CẬP NHẬT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
