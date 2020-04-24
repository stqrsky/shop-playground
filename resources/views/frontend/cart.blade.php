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
                <tr>
                    <td><img src="https://dummyimage.com/50x50/55595c/fff"> </td>
                    <td>Product Name Dada</td>
                    <td>
                        <form>
                            <div class="input-group">
                                <input class="form-control mr-2" type="text" value="1">
                                <button type="submit" class="btn btn-sm btn-secondary">Update</button>
                            </div>
                        </form>
                    </td>
                    <td></td>
                    <td class="text-right">124,90 €</td>
                    <td class="text-right">
                        <button class="btn btn-sm btn-danger">✖</button>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"><strong>Total</strong></td>
                    <td class="text-right"><strong>346,90 €</strong></td>
                    <td></td>
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