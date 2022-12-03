<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    public $searchTerm;

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
        $search = '%' . $this->searchTerm . '%';
        $categories = Category::where('name', 'LIKE', $search)
            ->orWhere('slug', 'LIKE', $search)
            ->orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.admin-category-component', ['categories' => $categories])->layout("layouts.base");
    }
}
