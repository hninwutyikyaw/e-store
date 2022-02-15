@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title slider-title float-left">Sliders</h4>
        <a href="{{ route('sliders.create') }}" class="btn btn-primary add-category-btn float-right">Add Slider</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider )
                    <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->heading}}</td>
                    <td>{{ $slider->description }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/slider/'.  $slider->image) }}" width="100px" alt="">
                    </td>
                    <td>
                        @if($slider->status === '1') 
                            visible
                        @else   
                            hidden
                        @endif
                    <td>
                        <a href="{{ route('sliders.edit',$slider->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete" onclick="return confirm('Are u sure?')">Delete</button>
                        </form>
                    </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection