@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title product-title float-left">Products</h4>
        <a href="{{ route('products.create') }}" class="btn btn-primary add-product-btn float-right">Add product</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <th>Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category->name}}</td>
                    <td>{{ $product->name}}</td>
                    {{-- <td>{{ number_format( $product->selling_price, 0, '.',',') }}</td> --}}
                     <td>{{ $product->selling_price }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/product/'.  $product->image) }}" width="100px" alt="">
                    </td>
                    <td>
                        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" enctype="multipart/form-data">
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