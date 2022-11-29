<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeValue;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Subcategory;

class AdminEditProductComponent extends Component
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
    public $newImage;
    public $product_id;

    public $images;
    public $newImages;
    public $sCategory_id;

    public $attr;
    public $inputs = [];
    public $arr_attributes = [];
    public $attribute_values = [];

    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
        'short_description' => 'required',
        'description' => 'required',
        'regular_price' => 'required|numeric',
        'sale_price' => 'numeric',
        'SKU' => 'required',
        'stock_status' => 'required',
        'quantity' => 'required|numeric',
        'category_id' => 'required'
    ];

    public function addAttribute()
    {
        if (!$this->arr_attributes->contains($this->attr)) {
            $this->inputs->push($this->attr);
            $this->arr_attributes->push($this->attr);
        }
    }

    public function removeAttribute($attr)
    {
        unset($this->inputs[$attr]);
    }

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = explode(',', $product->images);
        $this->category_id = $product->category_id;
        $this->sCategory_id = $product->subcategory_id;
        $this->product_id = $product->id;
        $this->inputs = $product->attributeValues->where('product_id', $product->id)->unique('product_attribute_id')->pluck('product_attribute_id');
        $this->arr_attributes = $product->attributeValues->where('product_id', $product->id)->unique('product_attribute_id')->pluck('product_attribute_id');

        foreach ($this->arr_attributes as $arr_attribute) {
            $all_values = AttributeValue::where('product_id', $product->id)->where('product_attribute_id', $arr_attribute)->get()->pluck('value');
            $val_string = '';
            foreach ($all_values as $value) {
                $val_string = $val_string . $value . ',';
            }
            $this->attribute_values[$arr_attribute] = rtrim($val_string, ',');
        }
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required'
        ]);

        if ($this->newImage) {
            $this->validateOnly($fields, [
                'newImage' => 'required|mimes:jpg,jpeg,png'
            ]);
        }
    }

    public function updateProduct()
    {
        $this->validate();
        if ($this->newImage) {
            $this->validate(['newImage' => 'required|mimes:jpg,jpeg,png']);
        }

        $product = Product::find($this->product_id);
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
        if ($this->newImage) {
            unlink('assets/images/products/' . $product->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('products', $imageName);
            $product->image = $imageName;
        }

        if ($this->newImages) {
            if ($product->images) {
                $images = explode(',', $product->images);
                foreach ($images as $image) {
                    if ($image) {
                        unlink('assets/images/products/' . $image);
                    }
                }
            }

            $imagesName = '';
            foreach ($this->newImages as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
            $product->images = $imagesName;
        }

        $product->category_id = $this->category_id;
        if ($this->sCategory_id) {
            $product->subcategory_id = $this->sCategory_id;
        }
        $product->save();

        AttributeValue::where('product_id', $product->id)->delete();
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

        session()->flash('message', 'Product has been updated successfully!');
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
        return view('livewire.admin.admin-edit-product-component', [
            'categories' => $categories,
            'sCategories' => $sCategories,
            'p_attributes' => $p_attributes
        ])->layout("layouts.base");
    }
}
