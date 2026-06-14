@extends('admin-panel.layouts.master')
@section('title', 'Category Admin - OM JASDUN')
@section('content')

<!-- Main Category Product -->
<section>
    <!-- Topbar -->
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-display text-4xl font-black text-jasdun-green">
                Kategori Produk
            </h1>
            <p class="mt-2 text-slate-600">
                Kelola kategori produk hampers, parcel, sembako, dan gift box.
            </p>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <label class="relative block">
                <input type="search" placeholder="Cari kategori..."
                    class="w-full border border-slate-200 bg-white px-4 py-3 pr-10 text-sm outline-none focus:border-jasdun-green sm:w-72">
                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400">⌕</span>
            </label>

            <a href="{{ route('admin.category.create') }}"
                class="bg-jasdun-green px-5 py-3 text-xs font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2">
                + Tambah Kategori
            </a>
        </div>
    </div>

    <!-- Statistic Cards -->
    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
        <div class="bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                Total Kategori
            </p>
            <h2 class="mt-5 font-display text-4xl font-black text-jasdun-green">
                {{ $totalCategories ?? $categories->count() }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Kategori produk terdaftar.
            </p>
        </div>

        <div class="bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                Kategori Aktif
            </p>
            <h2 class="mt-5 font-display text-4xl font-black text-jasdun-green">
                {{ $activeCategories ?? $categories->count() }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Kategori yang siap digunakan.
            </p>
        </div>

        <div class="bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                Total Produk
            </p>
            <h2 class="mt-5 font-display text-4xl font-black text-jasdun-green">
                {{ $totalProducts ?? 0 }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Produk dari semua kategori.
            </p>
        </div>

        <div class="bg-white p-6 shadow-sm ring-1 ring-slate-100">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                Status
            </p>
            <h2 class="mt-5 font-display text-3xl font-black text-jasdun-green">
                Aktif
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Data kategori siap dikelola.
            </p>
        </div>
    </div>

    <!-- Category Table -->
    <div class="mt-8 bg-white shadow-sm ring-1 ring-slate-100">
        <div class="flex flex-col gap-4 border-b border-slate-100 p-6 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="font-display text-2xl font-black text-jasdun-green">
                    Daftar Kategori
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Tambahkan, ubah, atau hapus kategori produk toko.
                </p>
            </div>

            <a href="{{ route('admin.category.create') }}"
                class="bg-jasdun-green px-5 py-3 text-xs font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2">
                Tambah Data
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left">
                <thead class="bg-slate-50 text-xs uppercase tracking-widest text-slate-500">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama Kategori</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($categories as $category)
                    <tr class="transition hover:bg-jasdun-cream/40">
                        <td class="px-6 py-5 font-bold text-slate-600">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="grid h-12 w-12 place-items-center bg-jasdun-green text-lg font-black text-white">
                                    {{ strtoupper(substr($category->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="font-bold text-jasdun-green">
                                        {{ $category->name }}
                                    </p>
                                    <p class="text-xs text-slate-500">
                                        Kategori Produk
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                    class="bg-yellow-50 px-4 py-2 text-xs font-black uppercase tracking-widest text-yellow-700 transition hover:bg-yellow-100">
                                    Edit
                                </a>

                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                                Belum ada kategori
                            </h3>
                            <p class="mt-2 text-sm text-slate-500">
                                Silakan tambahkan kategori produk terlebih dahulu.
                            </p>

                            <a href="{{ route('admin.category.create') }}"
                                class="mt-6 inline-block bg-jasdun-green px-5 py-3 text-xs font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2">
                                + Tambah Kategori
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex flex-col gap-4 border-t border-slate-100 p-6 md:flex-row md:items-center md:justify-between">
            <p class="text-sm text-slate-500">
                Menampilkan {{ $categories->count() }} kategori produk.
            </p>

            <div class="flex items-center gap-2">
                <button class="grid h-9 w-9 place-items-center bg-jasdun-green font-bold text-white">
                    1
                </button>
                <button class="grid h-9 w-9 place-items-center border border-slate-200 bg-white font-bold text-slate-700">
                    2
                </button>
                <button class="grid h-9 w-9 place-items-center border border-slate-200 bg-white font-bold text-slate-700">
                    3
                </button>
            </div>
        </div>
    </div>
</section>

@endsection