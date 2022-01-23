@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Add Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ url("store-category") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control">
                    @error('slug')
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

                <div class="col-md-6 mb-3 pl-5">
                    <input type="checkbox" name="status" class="form-check-input" >
                    <label for="status">Status</label>
                </div>

                <div class="col-md-6 mb-3 pl-5">
                    <input type="checkbox" name="popular" class="form-check-input" >
                    <label for="popular">Popular</label>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="image">image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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

                <button class="btn btn-primary ml-3" type="submit">Save</button>
            </div>
        </form>
        
    </div>
</div>
@endsection