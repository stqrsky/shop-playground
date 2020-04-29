@extends('frontend/layouts/app')

@section('content')
<div class="container mb-4">
    <h1 class="my-5">Failure</h1>
    <h4 class="mb-5">Something went wrong while processing your order.</h4>
    <a href="{{ route('cart') }}" class="btn btn-primary mb-3">Back to cart</a>
</div>
@endsection