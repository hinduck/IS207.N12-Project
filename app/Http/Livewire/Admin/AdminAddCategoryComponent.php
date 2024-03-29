<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    protected $rules = [
        'name' => 'required|',
        'slug' => 'required|unique:categories'
    ];

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory()
    {
        $this->validate();
        if ($this->category_id) {
            $category = new Subcategory();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->category_id = $this->category_id;
            $category->save();
        } else {
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
        }
        session()->flash('message', 'Danh Mục đã tạo thành công!');
        $this->reset();
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-category-component', ['categories' => $categories])->layout("layouts.base");
    }
}
