<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Danh Mục đã xóa thành công!');
    }

    public function deleteSubcategory($id)
    {
        $sCategory = Subcategory::find($id);
        $sCategory->delete();
        session()->flash('message', 'Danh Mục Phụ đã xóa thành công!');
    }

    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.admin-category-component', ['categories' => $categories])->layout("layouts.base");
    }
}
