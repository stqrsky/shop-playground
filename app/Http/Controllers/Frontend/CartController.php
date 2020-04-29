<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function cart()
    {
        $isEmpty = false;
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        } else {
            $isEmpty = true;
        };

        $cartItems = [];
        $total = 0;

        foreach ($cart as $key => $item) {
            $cartItems[$key] = array(
                'id' => $key,
                'qty' => $cart[$key],
                'name' => Product::find($key)->name,
                'price' => Product::find($key->price * $cart[$key])
            );
            $totalPrice += $cartItems[$key]['price'];
        };

        return view(
            'frontend/cart',
            [
                'cartItems' => $cartItems,
                'total' => $total,
                'isEmpty' => $isEmpty
            ]
        );
    }

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
        $data = $request->validate([
            'id' => 'required|integer',
            'qty' => 'required|integer'
        ]);
        $qty = (int) $data['qty'];
        $cart = session()->get('cart');
        if ($qty === 0)
            unset($cart[$request->id]);
        else
            $cart[$request->id] = $qty;
        if (empty($cart))
            session()->remove('cart');
        else
            session()->put('cart', $cart);
        return redirect('/cart');

        // first try
        // if ($request->id and $request->quantity) {
        //     $cart = session()->get('cart');

        //     $cart[$request->id]["quantity"] = $request->quantity;

        //     session()->put('cart', $cart);

        //     session()->flash('success', 'Cart updated successfully');
        // }
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
        // if ($request->id) {
        //     $cart = session()->get('cart');
        //     if (isset($cart[$request->id])) {
        //         unset($cart[$request->id]);
        //         session()->put('cart', $cart);
        //     }
        //     session()->flash('success', 'Product removed!');
        // }
        // return redirect()->back();

        // Product::remove($);
        // return redirect()->back();
    }
}
