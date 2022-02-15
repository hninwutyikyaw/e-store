@extends('layouts.front')

@section('title')
    E-store
@endsection

@section('content')
    @include('layouts.inc.frontslider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($featured_products as $featured_product)
                        <div class="item">
                                <div class="card feature-card bg-light">
                                    <img src="{{ asset('assets/uploads/product/'.  $featured_product->image) }}" alt="">
                                </div>
                                <p class="feature-title mt-2 fw-bold">{{ $featured_product->name }}</p>
                                <p class="feature-price">K{{ $featured_product->selling_price }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Category</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($trending_categories as $trending_category)
                        <div class="item">
                                <div class="card feature-card bg-light">
                                    <img src="{{ asset('assets/uploads/category/'.  $trending_category->image) }}" alt="">
                                </div>
                                <p class="feature-title mt-2 fw-bold">{{ $trending_category->name }}</p>
                                <p class="feature-price">K{{ $trending_category->selling_price }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
@endsection