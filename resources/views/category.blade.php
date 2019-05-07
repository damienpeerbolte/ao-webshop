@extends('layouts.app')
<link href="{{ asset('css/category.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <h1>Category: {{ $category['categoryName'] }}</h1><br />
    
    <div class="productList">
        @foreach($products as $product)
            <div class="products">
                <a href="/product/{{ str_replace(' ', '_', $product['id']) }}">
                    <img class="productImage" src="{{ $product['productPicture'] }}" alt="productPhoto">
                </a>
                <div class="productInfoSmall">
                    <h5>{{ $product['productName'] }}</h5>
                    <h6>&euro;{{ $product['price'] }}</h6>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
