<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hồ sơ cá nhân
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        @if($user->profile->image)
                            <img src="{{ asset('assets/images/profile')}}/{{ $user->profile->image }}" width="100%" alt="">
                        @else
                            <img src="{{ asset('assets/images/profile/default.png') }}" width="100%" alt="">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <p><b>Họ và tên: </b>{{$user->name}}</p>
                        <p><b>Email: </b>{{$user->email}}</p>
                        <p><b>SĐT: </b>{{$user->profile->mobile}}</p>
                        <hr>
                        <p><b>Số nhà - Tổ - Khu phố: </b>{{$user->profile->line1}}</p>
                        <p><b>Tên đường: </b>{{$user->profile->line2}}</p>
                        <p><b>Phường/Xã: </b>{{$user->profile->city}}</p>
                        <p><b>Tỉnh/Thành Phố: </b>{{$user->profile->province}}</p>
                        <p><b>Quốc gia: </b>{{$user->profile->country}}</p>
                        <p><b>ZIP Code: </b>{{$user->profile->zip_code}}</p>
                        <a href="{{ route('user.editprofile') }}" class="btn btn-info pull-right">Cập nhật hồ sơ cá nhân</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
