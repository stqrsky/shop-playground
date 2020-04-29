@extends('frontend/layouts/app')

@section('content')
<div class="container mb-4">
    <h1 class="my-5">Your Cart</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;"> </th>
                    <th scope="col" style="width: 40%;">Product</th>
                    <th scope="col" style="width: 20%;">Quantity</th>
                    <th scope="col" style="width: 10%;"></th>
                    <th scope="col" class="text-right" style="width: 10%;">Price</th>
                    <th scope="col" style="width: 10%;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $cartItem)
                <tr>
                    <form method="POST" class="form-inline my-2 my-lg-0" action="{{ route('updateCart', $cartItem) }}">
                        @csrf
                        @method('PATCH')
                        <td><img src="https://dummyimage.com/50x50/55595c/fff"> </td>
                        <td>{{ $cartItem['name']}}</td>
                        <td>
                            <form>
                                <div class="input-group">
                                    <input class="form-control mr-2" type="text" value={{ $product['qty'] }}>
                                    <button type="submit" class="btn btn-sm btn-secondary">Update</button>
                                </div>
                            </form>
                        </td>
                        <td></td>
                        <td class="text-right">{{ $cartItem['price'] }}</td>
                        <td class="text-right">
                            <button class="btn btn-sm btn-danger" onclick="deleteForm.submit(); return false;">✖</button>
                        </td>
                        <form id="deleteForm" method="POST" action="{{ route('removeFromCart', $cartItem) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"><strong>Total</strong></td>
                    <td class="text-right">
                        <strong>{{ $total }}</strong> </td>
                    <td>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between">
        <a href="/" class="btn btn-light">Continue Shopping</a>
        <a href="#" class="btn btn-primary">Checkout</a>
    </div>
</div>
@endsection