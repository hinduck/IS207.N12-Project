<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="updateProduct">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                    @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug">
                                    @error('slug') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="short_description" placeholder="Short Description" wire:model="short_description"></textarea>
                                    @error('short_description') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="description" placeholder="Description" wire:model="description"></textarea>
                                    @error('description') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price">
                                    @error('regular_price') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price">
                                    @error('sale_price') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                                    @error('SKU') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Stock</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="stock_status">
                                        <option value="in_stock">In Stock</option>
                                        <option value="out_stock">Out of Stock</option>
                                    </select>
                                    @error('stock_status') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Featured</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Quantity</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity">
                                    @error('quantity') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Product Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newImage">
                                    @if ($newImage)
                                        <img src="{{$newImage->temporaryUrl()}}" width="120">
                                    @else 
                                        <img src="{{asset('assets/images/products')}}/{{$image}}" alt="" width="120">
                                    @endif
                                    @error('newImage') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Product Gallery</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newImages" multiple>
                                    @if ($newImages)
                                        @foreach ($newImages as $newImage)
                                            @if($newImage)
                                                <img src="{{$newImage->temporaryUrl()}}" width="120">
                                            @endif
                                        @endforeach
                                    @else 
                                        @foreach ($images as $image)
                                            @if($image)
                                                <img src="{{asset('assets/images/products')}}/{{$image}}" width="120">
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach                                        
                                    </select>
                                    @error('category_id')  <span class="text-danger">{{$message}}</span> @enderror  
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Sub Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="sCategory_id">
                                        <option value="0">Select Category</option>
                                        @foreach ($sCategories as $sCategory)
                                            <option value="{{$sCategory->id}}">{{$sCategory->name}}</option>
                                        @endforeach                                        
                                    </select>
                                    @error('sCategory_id')  <span class="text-danger">{{$message}}</span> @enderror  
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Attributes</label>
                                <div class="col-md-3">
                                    <select class="form-control" wire:model="attr">
                                        <option value="0">Select Attribute</option>
                                        @foreach ($p_attributes as $p_attribute)
                                            <option value="{{$p_attribute->id}}">{{$p_attribute->name}}</option>
                                        @endforeach                                        
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-info" wire:click.prevent="addAttribute">Add</button>
                                </div>
                            </div>
                            
                            @foreach($inputs as $key => $value)
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">{{$p_attribute->where('id', $arr_attributes[$key])->first()->name}}</label>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="{{$p_attribute->where('id', $arr_attributes[$key])->first()->name}}" class="form-control input-md" wire:model="attribute_values.{{$value}}">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="removeAttribute( {{$key}} )">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                            
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        ClassicEditor
        .create( document.querySelector( '#short_description' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
    });
</script>
    
@endpush