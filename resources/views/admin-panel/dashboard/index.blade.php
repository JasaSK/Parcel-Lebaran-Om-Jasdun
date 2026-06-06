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
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Produk</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Gambar</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($products as $key => $product)
                    @php
                    $firstImage = $product->images->first();

                    $imageUrl = asset('images/no-image.png');

                    if ($firstImage && $firstImage->image_path) {
                    if (str_starts_with($firstImage->image_path, 'http://') || str_starts_with($firstImage->image_path, 'https://')) {
                    $imageUrl = $firstImage->image_path;
                    } else {
                    $imageUrl = asset('storage/' . $firstImage->image_path);
                    }
                    }
                    @endphp

                    <tr class="transition hover:bg-jasdun-cream/40">
                        <td class="px-6 py-5 font-bold text-slate-600">
                            {{ $key + 1 }}
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <img src="{{ $imageUrl }}"
                                    alt="{{ $product->name }}"
                                    class="h-16 w-16 rounded-xl object-cover ring-1 ring-slate-100">

                                <div>
                                    <p class="font-bold text-jasdun-green">
                                        {{ $product->name }}
                                    </p>
                                    <p class="mt-1 line-clamp-1 max-w-xs text-xs text-slate-500">
                                        {{ $product->description ?? 'Tidak ada deskripsi.' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-5">
                            <span class="bg-jasdun-gold/20 px-3 py-1 text-xs font-black uppercase tracking-widest text-jasdun-green">
                                {{ $product->category->name ?? '-' }}
                            </span>
                        </td>

                        <td class="px-6 py-5 font-bold text-jasdun-green">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-5">
                            <span class="bg-slate-100 px-3 py-1 text-xs font-black uppercase tracking-widest text-slate-600">
                                {{ $product->images_count ?? $product->images->count() }} Foto
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-14 text-center">
                            <h3 class="font-display text-2xl font-black text-jasdun-green">
                                Belum ada produk
                            </h3>
                            <p class="mt-2 text-sm text-slate-500">
                                Silakan tambahkan produk terlebih dahulu.
                            </p>

                            <a href="{{ route('products.create') }}"
                                class="mt-6 inline-block bg-jasdun-green px-5 py-3 text-xs font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2">
                                + Tambah Produk
                            </a>
                        </td>
                    </tr>
                    @endforelse
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