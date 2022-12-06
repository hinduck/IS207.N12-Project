<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use PDF;

class AdminProductComponent extends Component
{
    use WithPagination;
    
    public $searchTerm;

    public Collection $products;
    public Collection $selectedProducts;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            unlink('assets/images/products/' . $product->image);
        }
        if ($product->images) {
            $images = explode(',', $product->images);
            foreach ($images as $image) {
                if ($image) {
                    unlink('assets/images/products/' . $image);
                }
            }
        }
        $product->delete();
        session()->flash('message', 'Sản Phẩm đã xóa thành công!');
        return redirect()->route('admin/products');
    }

    public function mount()
    {
        $this->products = Product::with('category')->get();
        $this->selectedProducts = collect();
    }

    public function export($ext) {
        abort_if(!in_array($ext, ['csv', 'xlsx', 'pdf']), Response::HTTP_NOT_FOUND);
        return Excel::export($ext);
    }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $products = Product::where('name', 'LIKE', $search)
            ->orWhere('stock_status', 'LIKE', $search)
            ->orWhere('regular_price', 'LIKE', $search)
            ->orWhere('sale_price', 'LIKE', $search)->paginate(10);
        return view('livewire.admin.admin-product-component', ['products' => $products])->layout("layouts.base");
    }
}
