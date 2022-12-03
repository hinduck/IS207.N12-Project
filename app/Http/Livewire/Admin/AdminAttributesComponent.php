<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAttributesComponent extends Component
{
    public $searchTerm;

    public function deleteAttribute($id)
    {
        $p_attribute = ProductAttribute::find($id);
        $p_attribute->delete();
        session()->flash('message', 'Đặc Điểm đã xóa thành công!');
    }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $p_attributes = ProductAttribute::where('name', 'LIKE', $search)->paginate(5);
        return view('livewire.admin.admin-attributes-component', ['p_attributes' => $p_attributes])->layout("layouts.base");
    }
}
