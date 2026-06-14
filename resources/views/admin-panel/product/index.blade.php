@extends('admin-panel.layouts.master')
@section('title', 'Product Admin - OM JASDUN')
@section('content')

<!-- Main Product Page -->
<section>
    <!-- Topbar -->
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-display text-4xl font-black text-jasdun-green">
                Produk
            </h1>
            <p class="mt-2 text-slate-600">
                Kelola data produk, kategori, harga, stok, dan gambar produk OM JASDUN.
            </p>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <form action="{{ route('admin.product.index') }}" method="GET" class="relative block">
                <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari produk..."
                    class="w-full border border-slate-200 bg-white px-4 py-3 pr-10 text-sm outline-none focus:border-jasdun-green sm:w-72">
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400">
                    ⌕
                </button>
            </form>

            <a href="{{ route('admin.product.create') }}"
                class="bg-jasdun-green px-5 py-3 text-xs font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2">
                + Tambah Produk
            </a>
        </div>
    </div>

    <!-- Alert Success -->
    @if (session('success'))
    <div class="mb-6 border border-emerald-200 bg-emerald-50 p-5 text-sm font-bold text-emerald-700">
        {{ session('success') }}
    </div>
    @endif

    <!-- Statistic Cards -->
    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
        <div class="bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                Total Produk
            </p>
            <h2 class="mt-5 font-display text-4xl font-black text-jasdun-green">
                {{ $totalProducts ?? 0 }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Produk terdaftar.
            </p>
        </div>

        <div class="bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                Total Kategori
            </p>
            <h2 class="mt-5 font-display text-4xl font-black text-jasdun-green">
                {{ $totalCategories ?? 0 }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Kategori produk aktif.
            </p>
        </div>

        <div class="bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                Tanpa Gambar
            </p>
            <h2 class="mt-5 font-display text-4xl font-black text-jasdun-green">
                {{ $productsWithoutImages ?? 0 }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Produk perlu dilengkapi gambar.
            </p>
        </div>
    </div>

    <!-- Product Table -->
    <div class="mt-8 bg-white shadow-sm ring-1 ring-slate-100">
        <div class="flex flex-col gap-4 border-b border-slate-100 p-6 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="font-display text-2xl font-black text-jasdun-green">
                    Daftar Produk
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Tambahkan, ubah, atau hapus produk yang tampil di halaman katalog.
                </p>
            </div>

            <a href="{{ route('admin.product.create') }}"
                class="bg-jasdun-green px-5 py-3 text-xs font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2">
                Tambah Data
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px] text-left">
                <thead class="bg-slate-50 text-xs uppercase tracking-widest text-slate-500">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Produk</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Gambar</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($products as $product)
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
                            {{ $products->firstItem() + $loop->index }}
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

                        <td class="px-6 py-5">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.product.edit', $product->id) }}"
                                    class="bg-yellow-50 px-4 py-2 text-xs font-black uppercase tracking-widest text-yellow-700 transition hover:bg-yellow-100">
                                    Edit
                                </a>

                                <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="bg-red-50 px-4 py-2 text-xs font-black uppercase tracking-widest text-red-700 transition hover:bg-red-100">
                                        Hapus
                                    </button>
                                </form>
                            </div>
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
                Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk.
            </p>

            <div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</section>

@endsection