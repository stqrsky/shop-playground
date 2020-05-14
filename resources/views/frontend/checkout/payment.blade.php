@extends('frontend/layouts/app')

@section('head')
<script src="https://js.stripe.com/v3/"></script>
@endsection

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
                    <pre class="mb-0">{{ $order->address }}</pre>
                </li>
            </ul>
            <div>Items:</div>
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
            <h4 class="mb-3">Payment</h4>
            <form id="payment-form">
                <label for="cc-number">Credit Card Information</label>

                <div id="card-element">
                    <!-- Elements will create input elements here -->
                </div>

                <!-- We'll put the error messages in this element -->
                <div id="card-errors" role="alert"></div>
            </form>
            <hr class="mb-4">
            <div class="d-flex justify-content-between">
                <a href="{{ url('checkout/shipping') }}" class="btn btn-light">Back</a>
                <button id="submit" class="btn btn-primary">Buy</button>
            </div>
        </div>
    </div>
</div>

<script>
var stripe = Stripe("{{ config('stripe.publishable_key') }}");
var elements = stripe.elements();
var card = elements.create("card", {
    style: {
        fontSize: '16px'
    },
    classes: {
        base: 'form-control mb-2'
    }
});
card.mount("#card-element");

card.addEventListener('change', ({error}) => {
  const displayError = document.getElementById('card-errors');
  if (error) {
    displayError.textContent = error.message;
  } else {
    displayError.textContent = '';
  }
});

var submitButton = document.getElementById('submit');

submitButton.addEventListener('click', function(ev) {
  ev.preventDefault();
  stripe.confirmCardPayment("{{ $intent['client_secret'] }}", {
    payment_method: {
      card: card
    }
  }).then(function(result) {
    if (result.error) {
      // Show error to your customer (e.g., insufficient funds)
      window.location = "/checkout/fail"
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.
      }
      window.location = "/checkout/success"
    }
  });
});
</script>
@endsection