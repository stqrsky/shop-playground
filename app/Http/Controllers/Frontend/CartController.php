<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;

class CartController extends Controller
{
    public function show(Cart $cart)
    {
        return view('frontend/cart', [
            'products' => $cart->getProducts(),
            'total' => $cart->getTotal()
        ]);
    }

    public function addToCart(Cart $cart)
    {
        $data = $this->validateData();
        $cart->add(intval($data['id']), intval($data['qty']));

        return redirect('/cart');
    }

    public function updateCart(Cart $cart)
    {
        $data = $this->validateData();
        $cart->update(intval($data['id']), intval($data['qty']));

        return redirect('/cart');
    }

    public function removeFromCart(Cart $cart)
    {
        $data = request()->validate([
            'id' => 'required|integer'
        ]);
        $cart->remove(intval($data['id']));

        return redirect('/cart');
    }

    private function validateData()
    {
        return request()->validate([
            'id' => 'required|integer',
            'qty' => 'required|integer'
        ]);
    }
}
