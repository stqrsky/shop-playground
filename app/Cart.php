<?php

namespace App;

class Cart
{
    private $items;

    public function __construct()
    {
        $this->items = session()->get('cart', []);
    }

    public function add(int $id, int $qty)
    {
        if (isset($this->items[$id])) {
            $this->items[$id] += $qty;
        } else {
            $this->items[$id] = $qty;
        }

        session()->put('cart', $this->items);
    }

    public function update(int $id, int $qty)
    {
        $this->items[$id] = $qty;

        session()->put('cart', $this->items);
    }

    public function remove($id)
    {
        unset($this->items[$id]);

        session()->put('cart', $this->items);
    }

    public function getProducts()
    {
        $ids = array_keys($this->items);
        $products = Product::find($ids)->toArray();

        foreach ($products as &$product) {
            $product['qty'] = $this->items[$product['id']];
        }
        
        return $products;
    }

    public function getTotal()
    {
        $total = 0;
        $products = $this->getProducts();

        foreach ($products as $product) {
            $qty = $this->items[$product['id']];
            $total += $product['price'] * $qty;
        }

        return $total;
    }

    public static function getCount()
    {
        $items = session()->get('cart', []);

        return array_sum(array_values($items));
    }
}