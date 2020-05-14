@extends('frontend/layouts/app')

@section('content')
<div class="container mb-4">
    <h1 class="my-5">Success</h1>
    <h4 class="mb-5">Your order was placed sucessfully.</h4>
    <a href="{{ url('/') }}" class="btn btn-primary mb-3">Continue shopping</a>
</div>
@endsection