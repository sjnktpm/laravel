<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:15',
            'product_id' => 'required|exists:products,id',
        ]);

        Order::create($validated);

        return redirect()->route('user.products')->with('success', 'Order placed successfully!');
    }
}
