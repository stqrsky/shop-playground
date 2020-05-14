@extends('backend/layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Edit</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="breadcrumb-item">Edit</li>
    </ul>
</div>
<form class="tile" method="POST" action="{{ route('admin.users.update', $user->id) }}">
    @csrf
    @method('PUT')
    <div class="tile-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') ?? $user->name }}" type="text">
                    @error('name')
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">E-Mail</label>
                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') ?? $user->email }}" type="text">
                    @error('email')
                    <p class="invalid-feedback">{{ $errors->first('email') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password">
                    @error('password')
                    <p class="invalid-feedback">{{ $errors->first('password') }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="tile-footer">
        <a class="btn btn-secondary" href="{{ route('admin.users.index') }}">Cancel</a>
        <button class="btn btn-primary pull-right ml-2" type="submit">Save</button>
        <a class="btn btn-danger pull-right" onclick="deleteForm.submit(); return false;" href="#">Delete</a>
    </div>
</form>
<form id="deleteForm" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
    @csrf
    @method('DELETE')
</form>
@endsection