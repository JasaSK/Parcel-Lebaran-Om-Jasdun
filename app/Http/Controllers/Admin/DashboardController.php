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

        $latestOrders = [
            [
                'buyer' => 'Ahmad Sulaiman',
                'email' => 'sulaiman@email.com',
                'product' => 'Hampers Eid Classic A',
                'qty' => '1 Set',
                'total' => 1250000,
                'status' => 'Konfirmasi',
            ],
            [
                'buyer' => 'Siti Pertiwi',
                'email' => 'siti.p@webmail.com',
                'product' => 'Royal Parcel Platinum',
                'qty' => '2 Set',
                'total' => 4800000,
                'status' => 'Menunggu',
            ],
            [
                'buyer' => 'Budi Pratama',
                'email' => 'budi_p@corp.id',
                'product' => 'Paket Berkah Ramadhan',
                'qty' => '5 Set',
                'total' => 750000,
                'status' => 'Diproses',
            ],
        ];

        return view('admin-panel.dashboard.index', compact(
            'totalProducts',
            'totalCategories',
            'totalOrders',
            'totalRevenue',
            'latestOrders'
        ));
    }
}
