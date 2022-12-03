<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminCouponComponent extends Component
{
    public $searchTerm;

    public function deleteCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('message', 'Mã Giảm Giá đã xóa thành công!');
    }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $coupons = Coupon::where('code', 'LIKE', $search)
            ->orWhere('type', 'LIKE', $search)
            ->orWhere('value', 'LIKE', $search)
            ->orWhere('cart_value', 'LIKE', $search)
            ->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.admin-coupon-component', ['coupons' => $coupons])->layout("layouts.base");
    }
}
