@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $product->img_url) }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p><strong>Brand:</strong> {{ $product->brand }}</p>
                <p><strong>Price:</strong> €{{ number_format($product->price, 2, ',', '.') }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>
            </div>
        </div>
    </div>
@endsection
