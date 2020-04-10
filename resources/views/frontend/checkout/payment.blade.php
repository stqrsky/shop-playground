@extends('frontend/layouts/app')

@section('content')
<div class="container mb-4">
    <h1 class="my-5">Checkout</h1>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                Order Summary
            </h4>
            <div>Address:</div>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <pre class="mb-0">Max Musermann<br>Musterstr. 42<br>1234 Musterstadt</pre>
                </li>
            </ul>
            <div>Items:</div>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">1 x Product name</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">2 x Second product</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">2 x Third item</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between text-uppercase">
                    <strong>Total</strong>
                    <strong>$20</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Payment</h4>
            <div class="row">
                <div class="col-md-6 mb-6">
                    <label for="cc-number">Credit card number</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="1234 5678 901234" required="">
                    <div class="invalid-feedback">
                        Credit card number is required
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Expiration</label>
                    <input type="text" class="form-control" id="cc-expiration" placeholder="12/22" required="">
                    <div class="invalid-feedback">
                        Expiration date required
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-cvv">CVV</label>
                    <input type="text" class="form-control" id="cc-cvv" placeholder="123" required="">
                    <div class="invalid-feedback">
                        Security code required
                    </div>
                </div>
            </div>
            <hr class="mb-4">
            <div class="d-flex justify-content-between">
                <a href="/checkout-shipping" class="btn btn-light">Back</a>
                <button class="btn btn-primary" type="submit">Buy</button>
            </div>
        </div>
    </div>
</div>
@endsection