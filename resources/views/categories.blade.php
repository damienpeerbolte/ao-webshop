@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categories</h1>
    @foreach($categories as $category)
    <ul>
        <li>
            <a href="/categories/{{ str_replace(' ', '_', $category['categoryName']) }}">
                {{ $category['categoryName'] }}
            </a>
        </li>
    </ul>
    @endforeach
</div>
@endsection
