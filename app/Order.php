<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = ['id', 'address', 'stripe_pi_id'];

  public function orderItems()
  {
    return $this->hasMany('App\OrderItem');
  }

  public function addItems(array $items)
  {
    foreach ($items as $item) {
      $this->orderItems()->updateOrCreate([
        'name'        => $item['name']
      ], [
        'name'        => $item['name'],
        'description' => $item['description'],
        'qty'         => $item['qty'],
        'price'       => $item['price']
      ]);
    }
  }

  public function getTotal()
  {
    $subTotal = 0;

    foreach ($this->orderItems as $item) {
      $subTotal += $item->price * $item->qty;
    }

    return $subTotal;
  }

  public function getStatus()
  {
    $status = 'no_stripe_id_yet';

    if ($this->stripe_pi_id) {
      \Stripe\Stripe::setApiKey(config('stripe.secret_key'));
      $paymentIntent = \Stripe\PaymentIntent::retrieve($this->stripe_pi_id);
      $status = $paymentIntent->status;
    }

    return $status;
  }
}
