@extends('frontend/layouts/app')

@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-md-5">
      <img class="img-fluid mb-3" src="{{ $products->image }}" />
    </div>
    <div class="col-md-7">
      <h1>{{ $products->name }}</h1>
      <div class="mb-2">
        <span class="h4 font-weight-light mr-2">{{ $products->price }} €</span>
        @if($products->msrp)
        <del class="text-muted font-weight-light">
          {{ $products->msrp }} €
        </del>
        @endif
      </div>
      <p class="mb-4 text-muted">{{ $products->description }}</p>
      <form method="POST" action="{{ url('cart/add') }}" class="row mb-5 align-items-end">
        @csrf

        <input name="id" type="hidden" value="{{ $products->id }}">
        <div class="col-md-4">
          <label class="font-weight-bold">Qty</label>
          <input name="qty" type="number" value="1" class="form-control">
        </div>
        <div class="col-md-8">
          <button type="submit" class="btn btn-dark btn-lg">Add to Cart</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection