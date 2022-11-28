<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_id;
    public $category_slug;
    public $name;
    public $slug;
    public $sCategory_id;
    public $sCategory_slug;

    protected $rules = [
        'name' => 'required|',
        'slug' => 'required|unique:categories'
    ];

    public function mount($category_slug, $sCategory_slug = null)
    {
        if ($sCategory_slug) {
            $this->sCategory_slug = $sCategory_slug;
            $sCategory = Subcategory::where('slug', $sCategory_slug)->first();
            $this->sCategory_id = $sCategory->id;
            $this->category_id = $sCategory->category_id;
            $this->name = $sCategory->name;
            $this->slug = $sCategory->slug;
        } 
        else {
            $this->category_slug = $category_slug;
            $category = Category::where('slug', $category_slug)->first();
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
        }
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateCategory()
    {
        $this->validate();
        if ($this->category_id) {
            $sCategory = Subcategory::find($this->sCategory_id);
            $sCategory->name = $this->name;
            $sCategory->slug = $this->slug;
            $sCategory->category_id = $this->category_id;
            $sCategory->save();
        }
        else {
            $category = Category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
        }
        session()->flash('message', 'Category has been updated successfully!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-category-component', ['categories' => $categories])->layout("layouts.base");
    }
}
