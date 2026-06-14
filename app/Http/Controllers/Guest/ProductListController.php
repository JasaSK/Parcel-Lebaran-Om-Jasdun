<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductListController extends Controller
{
    public function index()
    {
        $products = Product::with(['images', 'category'])
            ->latest()
            ->get();

        $categories = Category::orderBy('name')->get();

        return view('guest.product.index', compact('products', 'categories'));
    }

    public function detail($id)
    {
        $product = Product::with(['images', 'category'])
            ->findOrFail($id);

        return view('guest.product.detail', compact('product'));
    }
}
