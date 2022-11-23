<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;

class AdminProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id) {
        $products = Product::find($id);
        $products->delete();
        session()->flash('message', 'Product has been deleted successfully!');
    }
    
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.admin-product-component', ['products' => $products])->layout("layouts.base");
    }
}