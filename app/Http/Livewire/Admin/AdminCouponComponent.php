<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminCouponComponent extends Component
{
    public function deleteCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('message', 'Mã Giảm Giá đã xóa thành công!');
    }

    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupon-component', ['coupons' => $coupons])->layout("layouts.base");
    }
}
