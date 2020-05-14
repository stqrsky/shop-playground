@extends('backend/layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Categories</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item">Categories</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">Add</a>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_filter pt-2">
                                Showing {{ $categories->firstItem() }}
                                to {{ $categories->lastItem() }}
                                of {{ $categories->total() }} entries
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td><a href="{{ route('admin.categories.edit', $category) }}"
                                                class="btn btn-primary btn-sm w-100">Edit</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pagination justify-content-center">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection