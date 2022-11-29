<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAttributesComponent extends Component
{
    public function deleteAttribute($id)
    {
        $p_attribute = ProductAttribute::find($id);
        $p_attribute->delete();
        session()->flash('message', 'Attribute has been deleted successfully!');
    }

    public function render()
    {
        $p_attributes = ProductAttribute::paginate(10);
        return view('livewire.admin.admin-attributes-component', ['p_attributes' => $p_attributes])->layout("layouts.base");
    }
}
