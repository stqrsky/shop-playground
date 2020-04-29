@extends('backend/layouts/app')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Create</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item">Create</li>
        </ul>
    </div>
    <form class="tile" method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="tile-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                        <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}">
                        @error('email')
                        <p class="invalid-feedback">{{ $errors->first('email') }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="tile-footer">
                <a class="btn btn-secondary" href="#">Cancel</a>
                <button class="btn btn-primary pull-right ml-2" type="submit">Save</button>
            </div>
    </form>
</main>
@endsection