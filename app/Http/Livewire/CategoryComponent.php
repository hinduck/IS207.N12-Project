<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;
    public $sCategory_slug;

    public $min_price;
    public $max_price;

    public function mount($category_slug, $sCategory_slug = null)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
        $this->sCategory_slug = $sCategory_slug;

        $this->min_price = 1000;
        $this->max_price = 999999;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Sản Phẩm đã được thêm vào Giỏ Hàng!');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        $category_id = null;
        $category_name = '';
        $filter = '';

        if ($this->sCategory_slug) {
            $sCategory = Subcategory::where('slug', $this->sCategory_slug)->first();
            $category_id = $sCategory->id;
            $category_name = $sCategory->name;
            $filter = 'sub';
        } else {
            $category = Category::where('slug', $this->category_slug)->first();
            $category_id = $category->id;
            $category_name = $category->name;
            $filter = '';
        }

        if ($this->sorting == 'date') {
            $products = Product::whereBetween(
                'regular_price',
                [
                    $this->min_price,
                    $this->max_price
                ])
                ->where($filter . 'category_id', $category_id)
                ->orderBy('created_at', 'DESC')
                ->paginate($this->pagesize);
        } else if ($this->sorting == "price") {
            $products = Product::whereBetween(
                'regular_price',
                [
                    $this->min_price,
                    $this->max_price
                ])
                ->where($filter . 'category_id', $category_id)
                ->orderBy('regular_price', 'ASC')
                ->paginate($this->pagesize);
        } else if ($this->sorting == "price-desc") {
            $products = Product::whereBetween(
                'regular_price',
                [
                    $this->min_price,
                    $this->max_price
                ])
                ->where($filter . 'category_id', $category_id)
                ->orderBy('regular_price', 'DESC')
                ->paginate($this->pagesize);
        } else {
            $products = Product::whereBetween(
                'regular_price',
                [
                    $this->min_price,
                    $this->max_price
                ])
                ->where($filter . 'category_id', $category_id)
                ->paginate($this->pagesize);
        }

        $categories = Category::all();

        return view('livewire.category-component', ['products' => $products, 'categories' => $categories, 'category_name' => $category_name])->layout("layouts.base");
    }
}
