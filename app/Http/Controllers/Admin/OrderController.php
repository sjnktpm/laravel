<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = UserOrder::with('product', 'user')->get();
        return view('admin.orders.index', compact('orders'));
    }
}

