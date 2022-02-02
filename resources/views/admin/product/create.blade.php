@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select form-control" name="category_id">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="small_description">Small Description</label>
                    <textarea name="small_description" id="" cols="30" rows="2" class="form-control"></textarea>
                    @error('small_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="original_price">Original Price</label>
                    <input type="number" name="original_price" class="form-control">
                    @error('original_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="selling_price">Selling Price</label>
                    <input type="number" name="selling_price" class="form-control">
                    @error('selling_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tax">Tax</label>
                    <input type="number" name="tax" class="form-control">
                    @error('tax')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control">
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="image">image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="status">Status</label>
                    <input type="checkbox" name="status" >
                </div>

                <div class="col-md-6 mb-3">
                    <label for="trending">Trending</label>
                    <input type="checkbox" name="trending" >
                </div>

                <div class="col-md-12 mb-3">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                    @error('meta_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="meta_description">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control">
                    @error('meta_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control">
                    @error('meta_keywords')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary float-right" type="submit">Save</button>
            </div>
        </form>
        
    </div>
</div>
@endsection