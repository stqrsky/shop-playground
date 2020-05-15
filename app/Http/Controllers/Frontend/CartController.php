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
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart', []);

        // find products from cart
        $ids = array_keys($cart);
        $products = Product::find($ids)->toArray();

        // calculate total... 
        $total = 0;
        foreach ($products as $index => $product) {
            $qty = $cart[$product['id']];
            $total += $product['price'] * $qty;

            // ... and set qty
            $products[$index]['qty'] = $qty;
        }

        return view('frontend/cart', [
            'products' => $products,
            'total' => $total
        ]);
    }

    public function addToCart(Request $request, bool $update = false)
    {
        $cart = session()->get('cart', []);
        $data = $request->validate([
            'id' => 'required|integer',
            'qty' => 'required|integer'
        ]);
        $id = (int) $data['id'];
        $qty = (int) $data['qty'];

        // update or set qty
        if (!isset($cart[$id]) || $update) {
            $cart[$id] = $qty;
        } else {
            $cart[$id] += $qty;
        }

        session()->put('cart', $cart);

        return redirect('/cart');
    }

    public function updateCart(Request $request)
    {
        return $this->addToCart($request, true);
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        unset($cart[$request->input('id')]);
        session()->put('cart', $cart);

        return redirect('/cart');
    }
}
