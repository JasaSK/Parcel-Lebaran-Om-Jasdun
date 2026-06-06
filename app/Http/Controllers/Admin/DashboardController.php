<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        // Sementara dummy dulu kalau tabel orders belum ada
        $totalOrders = 12;
        $totalRevenue = 15400000;

        $products = Product::latest()->take(5)->get();

        return view('admin-panel.dashboard.index', compact(
            'totalProducts',
            'totalCategories',
            'totalOrders',
            'totalRevenue',
            'products'
        ));
    }
}
