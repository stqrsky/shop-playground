<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Product;

class CheckoutController extends Controller
{
    public function shipping()
    {
        // schicke Nutzer ohne Warenkorb zurück
        if (!session('cart')) return redirect('/cart');

        // finde Bestellung via ID aus der session, oder lege eine neue an
        $order = Order::firstOrCreate(['id' => session('order')]);

        // füge den Inhalt des Warenkorbs der Bestellung hinzu
        $cart = session('cart');
        $ids = array_keys($cart);
        $products = Product::find($ids)->toArray();
        foreach ($products as $index => $product) {
            $products[$index]['qty'] = $cart[$product['id']];
        }
        $order->addItems($products);

        // speichere die Bestellung in der session
        session()->put('order', $order->id);

        // rendere den shipping-view
        return view('frontend/checkout/shipping', [
            'order' => $order
        ]);
    }

    public function payment()
    {
        // sende Nutzer ohne Order-ID in der Session zurück
        if (!session('order')) return redirect('/');

        // hol die Bestellung mittels der ID aus der Session
        $order = Order::find(session('order'));

        // Create Stripe Payment Intent
        \Stripe\Stripe::setApiKey(\Config::get('stripe.secret_key'));
        $intent = \Stripe\PaymentIntent::create([
            'amount' => round($order->getTotal() * 100),
            'currency' => 'eur',
        ]);
        $order->stripe_pi_id = $intent->id;
        $order->save();

        // rendere die payment-Seite
        return view('frontend/checkout/payment', [
            'order' => $order,
            'intent' => $intent
        ]);
    }

    public function success()
    {
        // lösche Cart- und Order-Session
        session()->forget('cart');
        session()->forget('order');

        // rendere die success-Seite 
        return view('frontend/checkout/success');
    }

    public function fail()
    {
        return view('frontend/checkout/fail');
    }

    public function setShippingAddress()
    {
        // sende Nutzer ohne Order-ID in der Session zurück
        if (!session()->has('order')) return redirect('/');

        // validiere die Nutzereingaben
        $data = request()->validate([
            'fullName' => 'required|min:3',
            'address' => 'required|min:3',
            'zip' => 'required|numeric|min:3',
            'city' => 'required|min:3',
            'country' => 'required|min:3'
        ]);

        // hol die Bestellung mittels der ID aus der Session
        // setze die Adresse und speichere die Bestellung
        $order = Order::find(session('order'));
        $order->address = join("\n", $data);
        $order->save();

        // leite den Nutzer auf die payment-Seite weiter
        return redirect('checkout/payment');
    }
}
