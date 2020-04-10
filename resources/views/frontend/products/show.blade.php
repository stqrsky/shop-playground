@extends('frontend/layouts/app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-5">
            <img class="img-fluid mb-3" src="https://images.unsplash.com/photo-1510018572596-e40e2619b412?fit=crop&w=500&h=350&q=80" />
        </div>
        <div class="col-md-7">
            <h1>{{ $product->name }}</h1>
            <div class="mb-2">
                <span class="h4 font-weight-light mr-2">{{ $product->price }} €</span>
                @if($product->msrp)
                <del class="text-muted font-weight-light">
                    {{ $product->msrp }} €
                </del>
                @endif
            </div>
            <p class="mb-4 text-muted">{{ $product->description }}</p>
            <div class="row mb-5 align-items-end">
                <div class="col-md-4">
                    <label class="font-weight-bold">Qty</label>
                    <input name="qty" type="number" value="1" class="form-control">
                </div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-dark btn-lg">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection