@extends('backend/layouts/app')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1>Products</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item">Products</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">Add</a>
              </div>
              <div class="col-sm-12 col-md-6">
                <div id="sampleTable_filter" class="dataTables_filter pt-2">
                  Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>MSRP</th>
                      <th>Stock</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->description }}</td>
                      <td>{{ $product->price }} €</td>
                      <td>{{ $product->msrp }} €</td>
                      <td>{{ $product->stock }}</td>
                      <td><a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary btn-sm w-100">Edit</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="pagination justify-content-center">
                  {{ $products->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</main>
@endsection