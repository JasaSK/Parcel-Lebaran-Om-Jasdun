@extends('admin-panel.layouts.master')

@section('content')
<!-- Main Dashboard -->
<section>
    <!-- Topbar -->
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-display text-4xl font-black text-jasdun-green">
                Dashboard
            </h1>
            <p class="mt-2 text-slate-600">
                Pantau status terkini operasional butik Anda hari ini.
            </p>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <label class="relative block">
                <input type="search" placeholder="Cari pesanan atau produk..."
                    class="w-full border border-slate-200 bg-white px-4 py-3 pr-10 text-sm outline-none focus:border-jasdun-green sm:w-72">
                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400">⌕</span>
            </label>

            <div class="flex items-center gap-3 bg-white px-4 py-3 shadow-sm ring-1 ring-slate-100">
                <div class="grid h-9 w-9 place-items-center rounded-full bg-jasdun-gold font-black text-jasdun-green">
                    3
                </div>
                <span class="text-sm font-bold text-slate-700">Administrator</span>
            </div>
        </div>
    </div>

    <!-- Statistic Cards -->
    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
        <div class="bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <div class="flex items-center justify-between">
                <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                    Total Produk
                </p>
                <span class="bg-emerald-50 px-2 py-1 text-xs font-black text-emerald-700">
                    +2 Baru
                </span>
            </div>
            <h2 class="mt-5 font-display text-4xl font-black text-jasdun-green">
                {{ $totalProducts }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Produk hampers tersedia.
            </p>
        </div>

        <div class="bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                Total Kategori
            </p>
            <h2 class="mt-5 font-display text-4xl font-black text-jasdun-green">
                {{ $totalCategories }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Kategori produk aktif.
            </p>
        </div>

        <div class="bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                Pesanan Masuk
            </p>
            <h2 class="mt-5 font-display text-4xl font-black text-jasdun-green">
                {{ $totalOrders }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Pesanan terbaru bulan ini.
            </p>
        </div>

        <div class="bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                Total Pendapatan
            </p>
            <h2 class="mt-5 font-display text-3xl font-black text-jasdun-green">
                Rp {{ number_format($totalRevenue, 0, ',', '.') }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Estimasi transaksi berhasil.
            </p>
        </div>
    </div>

    <!-- Latest Orders -->
    <div class="mt-8 bg-white shadow-sm ring-1 ring-slate-100">
        <div class="flex flex-col gap-4 border-b border-slate-100 p-6 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="font-display text-2xl font-black text-jasdun-green">
                    Pesanan Terbaru
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Kelola pengiriman dan status transaksi pelanggan.
                </p>
            </div>

            <button
                class="bg-jasdun-green px-5 py-3 text-xs font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2">
                Filter
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[820px] text-left">
                <thead class="bg-slate-50 text-xs uppercase tracking-widest text-slate-500">
                    <tr>
                        <th class="px-6 py-4">Produk</th>
                        <th class="px-6 py-4">Nama Pembeli</th>
                        <th class="px-6 py-4">Jumlah</th>
                        <th class="px-6 py-4">Total Harga</th>
                        <th class="px-6 py-4">Status Pesanan</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @foreach ($latestOrders as $order)
                    <tr class="transition hover:bg-jasdun-cream/40">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="grid h-12 w-12 place-items-center bg-jasdun-green text-2xl text-white">
                                    🎁
                                </div>
                                <div>
                                    <p class="font-bold text-jasdun-green">
                                        {{ $order['product'] }}
                                    </p>
                                    <p class="text-xs text-slate-500">
                                        Produk Premium
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-5">
                            <p class="font-bold text-slate-700">
                                {{ $order['buyer'] }}
                            </p>
                            <p class="text-sm text-slate-500">
                                {{ $order['email'] }}
                            </p>
                        </td>

                        <td class="px-6 py-5 font-semibold text-slate-700">
                            {{ $order['qty'] }}
                        </td>

                        <td class="px-6 py-5 font-bold text-jasdun-green">
                            Rp {{ number_format($order['total'], 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-5">
                            @php
                            $statusClass = match($order['status']) {
                            'Konfirmasi' => 'bg-blue-50 text-blue-700',
                            'Menunggu' => 'bg-yellow-50 text-yellow-700',
                            'Diproses' => 'bg-purple-50 text-purple-700',
                            'Selesai' => 'bg-emerald-50 text-emerald-700',
                            default => 'bg-slate-100 text-slate-700',
                            };
                            @endphp

                            <span class="{{ $statusClass }} px-3 py-1 text-xs font-black uppercase tracking-widest">
                                {{ $order['status'] }}
                            </span>
                        </td>

                        <td class="px-6 py-5">
                            <button class="font-bold text-jasdun-green hover:text-jasdun-gold">
                                Detail
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col gap-4 border-t border-slate-100 p-6 md:flex-row md:items-center md:justify-between">
            <p class="text-sm text-slate-500">
                Menampilkan 3 dari {{ $totalOrders }} pesanan terbaru
            </p>

            <div class="flex items-center gap-2">
                <button class="grid h-9 w-9 place-items-center bg-jasdun-green font-bold text-white">1</button>
                <button class="grid h-9 w-9 place-items-center border border-slate-200 bg-white font-bold text-slate-700">2</button>
                <button class="grid h-9 w-9 place-items-center border border-slate-200 bg-white font-bold text-slate-700">3</button>
            </div>
        </div>
    </div>
</section>

@endsection