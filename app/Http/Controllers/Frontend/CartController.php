<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function show()
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }
        $cart = session()->get('cart');
        return view('frontend/cart', [
            'cart' => $cart
        ]);
    }
    // $products = Product::find([]);

    public function addToCart(Request $request)
    {
        // validate input
        $data = $request->validate([
            'id' => 'required|integer',
            'qty' => 'required|integer'
        ]);

        // get cart from session
        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }

        // add product to cart
        $id = (int) $data['id'];
        $qty = (int) $data['qty'];
        if (isset($cart[$id])) {
            $cart[$id] += $qty;
        } else {
            $cart[$id] = $qty;
        }

        // put cart into session
        session()->put('cart', $cart);

        // redirect to cart view
        return redirect('/cart');
    }

    public function updateCart(Request $request, $id)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
        ////
        // $oldCart = session()->has('cart') ? session()->get('cart') : null;
        // $cart = new cart ($oldCart);
        // $quantity = $request->quantity;
        // $product = product->find($id);
        // $cart->updateItem($product, $id, $quantity);
        // session()->put('cart', $cart);
        // return response()->json(['success' => true]);
    }


    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed!');
        }
    }
}
