@extends('backend/layouts/app')

@section('content')
<div class="app-title">
    <div>
        <h1>Create</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Products</a></li>
        <li class="breadcrumb-item">Create</li>
    </ul>
</div>
<form class="tile" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="tile-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" rows="3"
                        name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="invalid-feedback">{{ $errors->first('description') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Price</label>
                    <input class="form-control @error('price') is-invalid @enderror" type="text" name="price"
                        value="{{ old('price') }}">
                    @error('price')
                    <p class="invalid-feedback">{{ $errors->first('price') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">MSRP</label>
                    <input class="form-control @error('msrp') is-invalid @enderror" type="text" name="msrp"
                        value="{{ old('msrp') }}">
                    @error('msrp')
                    <p class="invalid-feedback">{{ $errors->first('msrp') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Stock</label>
                    <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock"
                        value="{{ old('stock') }}">
                    @error('stock')
                    <p class="invalid-feedback">{{ $errors->first('stock') }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Image</label>
                    <div class="form-control py-3 @error('image') is-invalid @enderror">
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
    </div>
</form>
@endsection