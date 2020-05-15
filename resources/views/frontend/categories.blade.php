@extends('frontend/layouts/app')

@section('content')

<div class="container text-center">
  <h2 class="mb-3">All Categories</h2>
  <div class="row mb-5 d-flex justify-content-between">
    @foreach($categories as $category)
    <div class="col-md-4">
      <a href="{{ url('/categories/' . $category->id) }}" class="d-block rounded bg-dark mb-4 py-5 shadow-sm text-decoration-none">
        <h4 class="text-light m-4">{{ $category->name }}</h4>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection