@extends('frontend/layouts/app')

@section('content')
<div class="container mb-4">
    <h1 class="my-5">Your Cart</h1>
    @if(count($products))
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
                @foreach($products as $product)
                <tr>
                    <td><img width="40" height="40" src="{{ $product['image'] }}"></td>
                    <td>{{ $product['name'] }}</td>
                    <td>
                        <form method="POST" action="{{ route('updateCart') }}">
                            @csrf
                            @method('PATCH')

                            <div class="input-group">
                                <input type="hidden" name="id" value="{{ $product['id'] }}" />
                                <input type="text" name="qty" value="{{ $product['qty'] }}" class="form-control mr-2">
                                <button type="submit" class="btn btn-sm btn-secondary">Update</button>
                            </div>
                        </form>
                    </td>
                    <td></td>
                    <td class="text-right">{{ $product['price'] }} €</td>
                    <td class="text-right">
                        <form method="POST" action="{{ route('removeFromCart') }}">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="id" value="{{ $product['id'] }}" />
                            <button class="btn btn-sm btn-danger">✖</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"><strong>Total</strong></td>
                    <td class="text-right"><strong>{{ $total }} €</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ url('/') }}" class="btn btn-light">Continue Shopping</a>
        <a href="{{ url('checkout/shipping') }}" class="btn btn-primary">Checkout</a>
    </div>
    @else
    <h3 class="my-5">Your cart is empty.</h3>
    @endif
</div>
@endsection