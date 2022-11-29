<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminEditAttributeComponent extends Component
{
    public $name;
    public $attribute_id;

    protected $rules = ["name" => "required"];

    public function mount($attribute_id) {
        $p_attribute = ProductAttribute::find($attribute_id);
        $this->attribute_id = $p_attribute->id;
        $this->name = $p_attribute->name;
    }

    public function update($fields) {
        $this->validateOnly($fields);
    }

    public function updateAttribute() {
        $this->validate();

        $p_attribute = ProductAttribute::find($this->attribute_id);
        $p_attribute->name = $this->name;
        $p_attribute->save();
        session()->flash('message', 'Attribute has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-attribute-component')->layout("layouts.base");
    }
}
