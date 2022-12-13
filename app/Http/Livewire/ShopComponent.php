<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 1000;
        $this->max_price = 999999;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Thêm sản phẩm vào giỏ hàng');
        return redirect()->route('product.cart');
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $wproduct) {
            if ($wproduct->id == $product_id) {
                Cart::instance('wishlist')->remove($wproduct->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                return;
            }
        }
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
            )->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == "price") {
            $products = Product::whereBetween(
                'regular_price',
                [
                    $this->min_price,
                    $this->max_price
                ]
            )->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == "price-desc") {
            $products = Product::whereBetween(
                'regular_price',
                [
                    $this->min_price,
                    $this->max_price
                ]
            )->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::whereBetween(
                'regular_price',
                [
                    $this->min_price,
                    $this->max_price
                ]
            )->paginate($this->pagesize);
        }

        $categories = Category::all();

        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        return view(
            'livewire.shop-component',
            [
                'product' => $product,
                'products' => $products,
                'categories' => $categories,
                'popular_products' => $popular_products,
                'related_products' => $related_products,
                'sale' => $sale
            ]
        )->layout("layouts.base");
    }
}
