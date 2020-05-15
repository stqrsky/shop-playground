@extends('backend/layouts/app')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1>Edit</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
      <li class="breadcrumb-item">Edit</li>
    </ul>
  </div>
  <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" class="tile">
    @csrf
    @method('PUT')

    <div class="tile-body">
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $category->name }}" type="text">
            @error('name')
            <p class="invalid-feedback">{{ $errors->first('name') }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label class="control-label">Products</label>
            <select multiple autocomplete="off" class="form-control @error('products') is-invalid @enderror" name="products[]" size="20">
              @foreach ($products as $product)
              <option @if($selectedProducts->contains($product)) selected @endif
                value="{{ $product->id }}">{{ $product->name }}</option>
              @endforeach
            </select>
            @error('products')
            <p class="invalid-feedback">{{ $errors->first('products') }}</p>
            @enderror
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Image</label>
              <div class="form-control py-3">
                <img class="w-100 mb-3" src="https://via.placeholder.com/150" />
                <input type="file">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tile-footer">
        <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}">Cancel</a>
        <button class="btn btn-primary pull-right ml-2" type="submit">Save</button>
      </div>
  </form>
  <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
    @csrf
    @method('DELETE')

    <button class="btn btn-danger pull-right" href="{{ route('admin.categories.index') }}">Delete</button>
  </form>
</main>
@endsection