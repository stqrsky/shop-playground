@extends('backend/layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>View</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Order</a></li>
        <li class="breadcrumb-item">View</li>
    </ul>
</div>
<div class="tile">
    <div class="tile-body">
        <div class="form-group">
            <label class="control-label">Address:</label>
            <pre>{{ $order->address }}</pre>
        </div>
        <div class="form-group">
            <label class="control-label">Items:</label>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price }}€</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group">
        <div>Stripe Status: <span class="badge badge-secondary">{{ $order->getStatus() }}</span></div>
        </div>
        <div class="form-group">
            <div>Total: {{ $order->getTotal() }}€</div>
        </div>
    </div>
    <div class="tile-footer">
        <a class="btn btn-secondary" href="{{ route('admin.orders.index') }}">Back</a>
    </div>
</div>
@endsection