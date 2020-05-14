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
                @foreach($order->orderItems as $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $item->qty }} x {{ $item->name }}</h6>
                        <small class="text-muted">{{ Str::limit($item->description, 25) }}</small>
                    </div>
                    <span class="text-muted">{{ $item->price }}€</span>
                </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between text-uppercase">
                    <strong>Total</strong>
                    <strong>{{ $order->getTotal() }}€</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Shipping Address</h4>
            <form method="POST">
                @csrf

                <div class="mb-3">
                    <label for="fullName">Full name</label>
                    <input type="text" class="form-control @error('fullName') is-invalid @enderror" name="fullName"
                        value="{{ old('fullName') }}">
                    @error('fullName')
                    <p class="invalid-feedback">{{ $errors->first('fullName') }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                        value="{{ old('address') }}">
                    @error('address')
                    <p class="invalid-feedback">{{ $errors->first('address') }}</p>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control @error('zip') is-invalid @enderror" name="zip"
                            value="{{ old('zip') }}">
                        @error('zip')
                        <p class="invalid-feedback">{{ $errors->first('zip') }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="state">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                            value="{{ old('city') }}">
                        @error('city')
                        <p class="invalid-feedback">{{ $errors->first('city') }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100 @error('country') is-invalid @enderror"
                            name="country">
                            <option value="">Choose...</option>
                            <option>Germany</option>
                        </select>
                        @error('country')
                        <p class="invalid-feedback">{{ $errors->first('country') }}</p>
                        @enderror
                    </div>
                </div>
                <hr class="mb-4">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('cart') }}" class="btn btn-light">Back</a>
                    <button class="btn btn-primary" type="submit">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection