<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('backend/orders/index', [
            'orders' => Order::paginate(10),
        ]);
    }

    public function show(Order $order)
    {
        return redirect()->route('admin.orders.edit', $order);
    }
}
