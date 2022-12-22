<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use App\Models\Sale;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->min_price = 1000;
        $this->max_price = 999999;
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Món ăn đã được Thêm vào Giỏ Hàng');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        $product = Product::first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();
        $sale = Sale::find(1);
        if ($this->sorting == 'date') {
            $products = Product::whereBetween(
                'regular_price',
                [
                    $this->min_price,
                    $this->max_price
                ]
            )->where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == "price") {
            $products = Product::whereBetween(
                'regular_price',
                [
                    $this->min_price,
                    $this->max_price
                ]
            )->where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == "price-desc") {
            $products = Product::whereBetween(
                'regular_price',
                [
                    $this->min_price,
                    $this->max_price
                ]
            )->where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::whereBetween(
                'regular_price',
                [
                    $this->min_price,
                    $this->max_price
                ]
            )->where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->paginate($this->pagesize);
        }

        $categories = Category::all();

        return view('livewire.search-component', 
                    [
                        'product' => $product, 
                        'products' => $products, 
                        'categories' => $categories,
                        'popular_products' => $popular_products,
                        'related_products' => $related_products,
                        'sale' => $sale
                    ])->layout("layouts.base");
    }
}
