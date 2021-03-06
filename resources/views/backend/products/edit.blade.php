@extends('backend/layouts/app')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1>Edit</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
      <li class="breadcrumb-item">Edit</li>
    </ul>
  </div>
  <form method="POST" action="{{ route('admin.products.update', $product) }}" class="tile" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="tile-body">
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') ?? $product->name }}">
            @error('name')
            <p>{{ $errors->first('name') }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" rows="3" type="text" name="description">{{ old('description') ?? $product->description }}</textarea>
            @error('description')
            <p>{{ $errors->first('description') }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Price</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" value="{{ old('price') ?? $product->price }}">
            @error('price')
            <p>{{ $errors->first('price') }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">MSRP</label>
            <input class="form-control @error('msrp') is-invalid @enderror" type="text" name="msrp" value="{{ old('msrp') ?? $product->msrp }}">
            @error('msrp')
            <p>{{ $errors->first('msrp') }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Stock</label>
            <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock" value="{{ old('stock') ?? $product->stock }}">
            @error('stock')
            <p>{{ $errors->first('stock') }}</p>
            @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label">Image</label>
            <div class="form-control py-3 @error('image') is-invalid @enderror">
              <img class="w-100 mb-3" src="{{ $product->image }}" />
              <input type="file" name="image">
              @error('image')
              <p class="invalid-feedback">{{ $errors->first('image') }}</p>
              @enderror
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tile-footer">
      <a class="btn btn-secondary" href="{{ route('admin.products.index') }}">Cancel</a>
      <button class="btn btn-primary pull-right ml-2" type="submit">Save</button>
  </form>
  <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger pull-right" href="{{ route('admin.products.index') }}">Delete</button>
  </form>
  </div>
</main>
@endsection