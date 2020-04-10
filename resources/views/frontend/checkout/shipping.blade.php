@extends('frontend/layouts/app')

@section('content')
<div class="container mb-4">
    <h1 class="my-5">Checkout</h1>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                Order Summary
            </h4>
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
            <h4 class="mb-3">Shipping Address</h4>
            <form class="needs-validation" novalidate="">
                <div class="mb-3">
                    <label for="fullName">Full name</label>
                    <input type="text" class="form-control" name="fullName" value="">
                    <div class="invalid-feedback">
                        Valid Name is required.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" name="zip">
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city">
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" name="country">
                            <option value="">Choose...</option>
                            <option>Germany</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="d-flex justify-content-between">
                    <a href="/cart" class="btn btn-light">Back</a>
                    <button class="btn btn-primary" type="submit">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection