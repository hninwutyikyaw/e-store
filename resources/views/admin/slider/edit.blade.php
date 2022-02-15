@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title slider-title float-left">Edit Slider</h4>
        <a href="{{ url()->previous() }}" class="btn btn-danger float-right">Back</a>
    </div>
    <div class="card-body">
        <form action="{{ route('sliders.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                
                <div class="col-md-6 mb-3">
                    <label for="heading">Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $slider->heading }}">
                    @error('heading')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="" cols="30" rows="3" class="form-control">{{ $slider->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="link">link</label>
                    <input type="text" name="link" class="form-control" value="{{ $slider->link }}">
                    @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="link_name">Link Name</label>
                    <input type="text" name="link_name" class="form-control" value="{{ $slider->link_name }}">
                    @error('link_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="image">image</label>
                    @if($slider->image)
                        {{-- <input type="file" name="image" class="form-control"> --}}
                        <img src="{{ asset('assets/uploads/slider/'.  $slider->image) }}" width="100px" alt="">
                    @endif
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3 pl-5">
                    <input type="checkbox" name="status" class="form-check-input" {{ $slider->status === 1 ? 'checked' : ' ' }}>
                    <label for="status">Status</label>
                </div>

                <button class="btn btn-primary ml-3" type="submit">Save</button>
            </div>
        </form>
            
    </div>
</div>
@endsection