<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Fetch all products
        return view('user.index', compact('products'));
    }

    // Other methods (if needed)
}
