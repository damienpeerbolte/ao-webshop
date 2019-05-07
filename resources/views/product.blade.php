@extends('layouts.app')
<link href="{{ asset('css/product.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <img id="myImg" class="productImage" src="{{ $product['productPicture'] }}" alt="productImage">
    </div>
@endsection
