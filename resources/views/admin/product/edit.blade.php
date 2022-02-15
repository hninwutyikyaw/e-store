@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title slider-title float-left">Edit Product</h4>
        <a href="{{ url()->previous() }}" class="btn btn-danger float-right">Back</a>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if ($category->id == $product->category_id) 
                                    selected="selected"
                                @endif   
                            >
                            {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="small_description">Small description</label>
                    <textarea name="small_description" id="" cols="30" rows="3" class="form-control">{{ $product->small_description }}</textarea>
                    @error('small_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="" cols="30" rows="3" class="form-control">{{ $product->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="original_price">Original Price</label>
                    <input type="number" name="original_price" class="form-control" value="{{  $product->original_price }}">
                    @error('original_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="selling_price">Selling  Price</label>
                    <input type="number" name="selling_price" class="form-control" value="{{  $product->selling_price }}">
                    @error('selling_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tax">Tax</label>
                    <input type="number" name="tax" class="form-control" value="{{ $product->tax }}">
                    @error('tax')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6 mb-3 pl-5">
                    <input type="checkbox" name="status" class="form-check-input" {{ $product->status === 1 ? 'checked' : ' ' }}>
                    <label for="status">Status</label>
                </div>

                <div class="col-md-6 mb-3 pl-5"> 
                    <input type="checkbox" name="trending" class="form-check-input" {{ $product->trending === 1 ? 'checked' : ' '}} >
                    <label for="trending">Trending</label>
                </div>


                <div class="col-md-12 mb-3">
                    <label for="image">image</label>
                    @if($product->image)
                        <input type="file" name="image" class="form-control">
                        <img src="{{ asset('assets/uploads/product/'.  $product->image) }}" width="100px" alt="">
                    @endif
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}">
                    @error('meta_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="meta_description">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" value="{{ $product->meta_description }}">
                    @error('meta_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="{{ $product->meta_keywords }}">
                    @error('meta_keywords')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary ml-3" type="submit">Update</button>
            </div>
        </form>
        
    </div>
</div>
@endsection