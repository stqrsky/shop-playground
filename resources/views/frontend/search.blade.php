@extends('frontend/layouts/app')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class=" col-md-9">
            <h1 class="my-5">Search Results for "{{ $query }}"</h1>
        </div>
        <div class=" col-md-3">
            <select class="custom-select" onchange="changeUrlBar(this.value)">
                <option value="{{ request()->fullUrl() }}" @if($orderBy==='id' ) selected @endif>Order by</option>
                <option value="{{ request()->fullUrlWithQuery(['orderBy' => 'price']) }}" @if($orderBy==='price' )
                    selected @endif>Price</option>
                <option value="{{ request()->fullUrlWithQuery(['orderBy' => 'name']) }}" @if($orderBy==='name' )
                    selected @endif>Name</option>
                <option value="{{ request()->fullUrlWithQuery(['orderBy' => 'created_at']) }}"
                    @if($orderBy==='created_at' ) selected @endif>Date</option>
            </select>
        </div>
    </div>
    <div class="row mb-5 d-flex justify-content-start text-center">
        @foreach($products as $product)
        <div class="col-md-3">
            <a href="{{ url("/products/{$product->id}") }}"
                class="d-block border rounded mb-4 p-0 shadow-sm text-decoration-none">
                <img class="img-fluid mb-3" src="{{ $product->image }}" />
                <h4 class="text-muted mb-1">{{ $product->name }}</h4>
                <div class="mb-3">
                    @if($product->msrp)<s class="text-muted">{{ $product->msrp }} €</s>@endif
                    <span class="text-dark">{{ $product->price }} €</span>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="pagination justify-content-center">
        {{ $products->links() }}
    </div>
</div>
<script>
    function changeUrlBar(value) {
        window.location = value;
    }
</script>
@endsection