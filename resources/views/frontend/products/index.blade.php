@extends('layouts.front')
@section('content')
<div class="py-5">
    <div class="container mt-3">
        <div class="row">
            <h2>{{ $category->name }}</h2>
                @foreach($products as $product)
                    <div class="col-md-3">
                            <div class="card category-card bg-light">
                                <img src="{{ asset('assets/uploads/product/'.  $product->image) }}" alt="">
                            </div>
                            <p class="category-title mt-2 fw-bold">{{ $product->name }}</p>
                            <p class="category-price">K{{ $product->original_price }}</p>
                    </div>
                @endforeach
        </div>
    </div>
</div>
@endsection