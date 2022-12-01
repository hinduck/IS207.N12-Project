<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $images;
    public $sCategory_id;

    public $attr;
    public $inputs = [];
    public $arr_attributes = [];
    public $attribute_values = [];

    protected $rules = [
        'name' => 'required',
        'slug' => 'required|unique:products',
        'short_description' => 'required',
        'description' => 'required',
        'regular_price' => 'required|numeric',
        'sale_price' => 'numeric',
        'SKU' => 'required',
        'stock_status' => 'required',
        'quantity' => 'required|numeric',
        'image' => 'required|mimes:jpg,jpeg,png',
        'category_id' => 'required'
    ];

    public function addAttribute()
    {
        if (!in_array($this->attr, $this->arr_attributes)) {
            array_push($this->inputs, $this->attr);
            array_push($this->arr_attributes, $this->attr);
        }
    }

    public function removeAttribute($attr)
    {
        unset($this->inputs[$attr]);
    }

    public function mount()
    {
        $this->stock_status = 'in_stock';
        $this->featured = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png',
            'category_id' => 'required'
        ]);
    }

    public function addProduct()
    {
        $this->validate();

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;

        if ($this->images) {
            $imagesName = '';
            foreach ($this->images as $key => $image) {
                $img = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('products', $img);
                $imagesName = $imagesName .  ',' . $img;
            }
            $product->images = $imagesName;
        }

        $product->category_id = $this->category_id;

        if ($this->sCategory_id) {
            $product->subcategory_id = $this->sCategory_id;
        }
        $product->save();

        foreach ($this->attribute_values as $key => $attribute_value) {
            $a_values = explode(',', $attribute_value);
            foreach ($a_values as $a_value) {
                $attr_value = new AttributeValue();
                $attr_value->product_attribute_id = $key;
                $attr_value->value = $a_value;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }

        session()->flash('message', 'Sản Phẩm đã tạo thành công!');
    }

    public function changeSubcategory()
    {
        $this->sCategory_id = 0;
    }

    public function render()
    {
        $categories = Category::all();
        $sCategories = Subcategory::where('category_id', $this->category_id)->get();
        $p_attributes = ProductAttribute::all();
        return view('livewire.admin.admin-add-product-component', [
            'categories' => $categories,
            'sCategories' => $sCategories,
            'p_attributes' => $p_attributes
        ])->layout("layouts.base");
    }
}
