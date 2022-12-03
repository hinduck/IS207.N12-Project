<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminOrderComponent extends Component
{
    public $searchTerm;

    public function updateOrderStatus($order_id, $status) {
        $order = Order::find($order_id);
        $order->status = $status;

        if ($status == "delivered") {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }
        else if ($status == "canceled") {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }

        $order->save();
        session()->flash('order_message', 'Trạng Thái Đơn Hàng đã cập nhật thành công!');
    }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $orders = Order::where('subtotal', 'LIKE', $search)
                    ->orWhere('discount', 'LIKE', $search)
                    ->orWhere('tax', 'LIKE', $search)
                    ->orWhere('total', 'LIKE', $search)
                    ->orWhere('first_name', 'LIKE', $search)
                    ->orWhere('last_name', 'LIKE', $search)
                    ->orWhere('mobile', 'LIKE', $search)
                    ->orWhere('email', 'LIKE', $search)
                    ->orWhere('zip_code', 'LIKE', $search)
                    ->orWhere('status', 'LIKE', $search)
                    ->orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-order-component', ['orders' => $orders])->layout("layouts.base");
    }
}
