@extends('frontend/layouts/app')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class=" col-md-9">
        <h1 class="my-5">{{ $category->name }}</h1>
        </div>
        <div class=" col-md-3">
            <select class="custom-select">
                <option selected>Order by</option>
                <option value="1">Price</option>
                <option value="2">Name</option>
                <option value="3">Date</option>
            </select>
        </div>
    </div>
    <div class="row mb-5 d-flex justify-content-start text-center">
        @foreach($products as $product)
        <div class="col-md-3">
            <a href="{{ url("/products/{$product->id}") }}" class="d-block border rounded mb-4 p-0 shadow-sm text-decoration-none">
                <img class="img-fluid mb-3" src="https://images.unsplash.com/photo-1510018572596-e40e2619b412?fit=crop&w=500&h=350&q=80" />
                <h4 class="text-muted mb-1">{{ $product->name }}</h4>
                <div class="mb-3">
                    @if($product->msrp)<s class="text-muted">{{ $product->msrp }} €</s>@endif
                    <span class="text-dark">{{ $product->price }} €</span>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
@endsection