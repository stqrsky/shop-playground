@extends('backend/layouts/app')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Edit</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Categories</a></li>
            <li class="breadcrumb-item">Edit</li>
        </ul>
    </div>
    <form class="tile">
        <div class="tile-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Price</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">MSRP</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Stock</label>
                        <input class="form-control" type="text">
                    </div>
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
            <a class="btn btn-secondary" href="#">Cancel</a>
            <button class="btn btn-primary pull-right ml-2" type="submit">Save</button>
            <a class="btn btn-danger pull-right" href="#">Delete</a>
        </div>
    </form>
</main>
@endsection