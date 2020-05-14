@extends('backend/layouts/app')

@section('content')
<div class="app-title">
    <div>
        <h1>Dashboard</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item">Home</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-cube fa-3x"></i>
            <div class="info">
                <h4>Products</h4>
                <p><b>{{ $productsCount }}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
                <h4>Categories</h4>
                <p><b>{{ $categoriesCount }}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-envelope-o fa-3x"></i>
            <div class="info">
                <h4>Orders</h4>
                <p><b>{{ $ordersCount }}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-user-o fa-3x"></i>
            <div class="info">
                <h4>Users</h4>
                <p><b>{{ $usersCount }}</b></p>
            </div>
        </div>
    </div>
</div>
@endsection