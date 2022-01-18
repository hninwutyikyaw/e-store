@extends('layouts.admin')

@section('content')
    {{-- @if(session('status'))
    <h6 class="alert alert-success mb-1">{{ session('status')}}</h6>
    @endif --}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title category-title float-left">Category</h4>
            <a href="{{ url('add-category') }}" class="btn btn-primary add-category-btn float-right">Add Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                        <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name}}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/category/'.  $category->image) }}" width="100px" alt="">
                        </td>
                        <td>
                            <a href="{{ url('edit-category/'. $category->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url('delete-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
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