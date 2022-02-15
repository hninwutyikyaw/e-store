@extends('layouts.front')

@section('content')
<div class="py-5">
    <div class="container mt-3">
        <div class="row">
            <h2>Category</h2>
                @foreach($categories as $category)
                    <div class="col-md-3">
                        <a href="{{ url('view-category/'.$category->slug) }}">
                            <div class="card category-card bg-light">
                                <img src="{{ asset('assets/uploads/category/'.  $category->image) }}" alt="">
                            </div>
                            <p class="category-title mt-2 fw-bold">{{ $category->name }}</p>
                            <p class="category-price">K{{ $category->description }}</p>
                        </a>
                    </div>
                @endforeach
        </div>
    </div>
</div>

@endsection