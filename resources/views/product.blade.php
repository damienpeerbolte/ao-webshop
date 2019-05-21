@extends('layouts.app')
<link href="{{ asset('css/product.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <img id="myImg" class="productImage" src="{{ $product['productPicture'] }}" alt="productImage">
        <div class="productInfo">
            <h1 class="productName">{{ $product['productName'] }}</h1>
            @if (strlen($product['productDescription']) >= 250)
                <h5 class="productDescriptionShort">{{ substr($product['productDescription'], 0, 250) }}... <a href="#productInfoFull">Read More</a></h5>
            @else
                <h5 class="productDescriptionShort">{{ substr($product['productDescription'], 0, 250) }}</h5>
            @endif
            <br />
            <a class="toCart" href="/addToCartViaArticle/{{str_replace(' ', '_', $category['categoryName'])}}/{{str_replace(' ', '_', $product['id'])}}/{{$product['id']}}">Add To Cart</a>

        </div>
        <hr style="margin-top:10%;">
        <div id="productInfoFull">
            <h3>Description</h3>
            <h5 class="productDescriptionShort">{{ $product['productDescription'] }}</h5>
        </div>
        <div class="toast" id="cartToast">Item added to cart.</div>
    </div>
@endsection
