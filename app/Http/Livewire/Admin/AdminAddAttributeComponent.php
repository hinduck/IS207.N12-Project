<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAddAttributeComponent extends Component
{
    public $name;

    protected $rules = ["name" => "required"];

    public function update($fields)
    {
        $this->validateOnly($fields);
    }

    public function storeAttribute()
    {
        $this->validate();

        $p_attribute = new ProductAttribute();
        $p_attribute->name = $this->name;
        $p_attribute->save();
        session()->flash('message', 'Đặc Điểm đã tạo thành công!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-attribute-component')->layout("layouts.base");
    }
}
