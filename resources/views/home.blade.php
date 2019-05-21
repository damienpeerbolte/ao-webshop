@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="justify-content: space-around;">

        <div class="col-lg-9">
            @foreach($categories as $category)
                <h1 class="card-footer" style="font-weight:bold;padding:10px;border-radius:5px;">{{ $category['categoryName'] }}</h1>


        <div class="row">
            @foreach ($products as $product)
            @if ($product['categoryId'] == $category['id'])
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="/{{ $category['categoryName'] }}/{{ $product['id'] }}"><img style="padding:10px;" class="card-img-top" src="{{ $product['productPicture'] }}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="/{{ $category['categoryName'] }}/{{ $product['id'] }}">{{ $product['productName'] }}</a>
                        </h4>
                        <h5 style="font-weight:bold;">&euro;{{ $product['price'] }},-</h5>
                        @if (strlen($product['productDescription']) >= 200)
                            <p class="card-text">{{ substr($product['productDescription'], 0, 150) }}...<a href="/{{ $category['categoryName'] }}/{{ $product['id'] }}">Read More</a></p>
                        @else
                            <p class="card-text">{{ $product['productDescription'] }}</p>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a style="font-weight:bold;font-size:16px;" href="/addToCartViaShop/{{$product['id']}}">Add To Cart</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        @endforeach
        <div class="toast" id="orderToast">Order Successful!</div>
        <div class="toast" id="cartToast">Item added to cart.</div>
    </div>
</div>
@endsection
