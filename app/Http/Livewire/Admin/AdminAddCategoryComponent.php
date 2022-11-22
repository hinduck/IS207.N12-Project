<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required|',
        'slug' => 'required|unique:categories'
    ];

    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory() {
        $this->validate();

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Category has been created successfully!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout("layouts.base");
    }
}
