<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('images')->latest()->take(6)->get();
        return view('guest.landing.index', compact('products', 'categories'));
    }
}
