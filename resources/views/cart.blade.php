@extends('layouts.app')

@section('content')

<div class="container">
    @foreach($items as $item)
    <div class="card mb-12">
        <div class="row no-gutters">
            <div class="col-md-2">
                <img src="{{$item[0]['productPicture']}}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$item[0]['productName']}}</h5>
                    <p class="card-text">{{$item[0]['productDescription']}}</p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <a href="/deleteFromCart/{{$item[0]['id']}}">delete</a>
                <p><a href="/removeAmount/{{$item[0]['id']}}">-</a>{{ $item[0]['amount'] }}<a href="/addAmount/{{$item[0]['id']}}">+</a></p>
                <p class="card-price">&euro;{{$item[0]['price']}}</p>
            </div>
        </div>
    </div>

    @endforeach

    <div class="card mb-12">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body text-right">
                    <h5 class="card-title">&euro;{{ $totalPrice }}</h5>
                </div>
            </div>
        </div>
    </div>
    <br />
    <button class="btn btn-primary btn-block" onclick="window.location.href = '/checkout';">Place Order</button>

</div>

@endsection
