@extends('layouts.app')

@section('content')

<div class="container">
    @foreach($orders as $order)
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Order: {{ $order['id'] }}
                    <span style="float:right;">
                        Total: &euro;{{ $order['totalPrice'] }},-
                    </span>
                </div>
                @foreach($order['data'] as $item)
                    <div class="card-body">
                        <p class="description">
                            {{ $item[0]['productName'] }}
                        </p>
                        <img class="card-item-image" src="{{ $item[0]['productPicture'] }}" class="card-img" height="100" width="100" alt="...">
                        <p class="description">
                            {{ $item[0]['productDescription'] }}
                        </p>
                        <p class="description">
                            Amount: {{ $item[0]['amount'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </br></br>
    @endforeach
</div>

@endsection
