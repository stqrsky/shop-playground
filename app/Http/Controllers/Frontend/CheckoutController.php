<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function shipping()
    {

        // TODO schicke Nutzer ohne Warenkorb zurück

        // TODO
        // prüfe ob der Nutzer schon eine Bestellung in der Session hat
        // wenn ja: hole sie aus der session
        // wenn nein: lege eine neue Bestellung an speichere sie in der Datenbank

        // TODO füge mit der neuen addItems-methode
        // den Inhalt des Warenkorbs der Bestellung hinzu

        // TODO speichere die Bestellung in der session

        // TODO rendere den shipping-view
        return view('frontend/checkout/shipping');
    }

    public function payment()
    {
        return view('frontend/checkout/payment');
    }

    public function success()
    {
        return view('frontend/checkout/success');
    }

    public function fail()
    {
        return view('frontend/checkout/fail');
    }

    public function setShippingAddress()
    {
    }
}
