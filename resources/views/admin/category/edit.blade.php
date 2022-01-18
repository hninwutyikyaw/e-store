@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ url("update-category/".$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="" cols="30" rows="3" class="form-control">{{ $category->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="status">Status</label>
                    <input type="checkbox" name="status" {{ $category->status == '1'  ? 'checked' : ' '}}>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="popular">Popular</label>
                    <input type="checkbox" name="popular" {{ $category->popular == '1' ? 'checked' : ' ' }}>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="image">image</label>
                    @if($category->image)
                        <img src="{{ asset('assets/uploads/category/'.  $category->image) }}" width="100px" alt="">
                    @endif
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}">
                    @error('meta_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="meta_description">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" value="{{ $category->meta_description }}">
                    @error('meta_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="{{ $category->meta_keywords }}">
                    @error('meta_keywords')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary float-right" type="submit">Update</button>
            </div>
        </form>
        
    </div>
</div>
@endsection