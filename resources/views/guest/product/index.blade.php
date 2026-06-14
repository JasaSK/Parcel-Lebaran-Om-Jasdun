@extends('guest.layouts.master')
@section('title', 'OM JASDUN - Parcel Lebaran Premium dan Hampers Eksklusif')
@section('meta_description', 'Pesan parcel Lebaran premium OM JASDUN untuk keluarga, sahabat, dan rekan kerja. Pilihan hampers elegan dengan kemasan mewah dan harga kompetitif.')
@section('meta_keywords', 'parcel lebaran, hampers lebaran, parcel premium, hampers eksklusif, om jasdun')
@section('og_image', asset('images/logo-omjasdun1.png'))
@section('content')

<main class="mx-auto max-w-7xl px-5 py-12 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-[260px_1fr]">

        <!-- Filter Sidebar -->
        <aside id="kategori" class="h-fit border border-slate-200 bg-white p-6 shadow-sm lg:sticky lg:top-24">
            <div>
                <h2 class="text-xs font-black uppercase tracking-[0.2em] text-jasdun-green">Pencarian</h2>
                <label class="relative mt-4 block">
                    <input id="searchInput" type="search" placeholder="Cari hampers..."
                        class="w-full border border-slate-200 bg-white px-4 py-3 pr-10 text-sm outline-none focus:border-jasdun-green" />
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400">⌕</span>
                </label>
            </div>

            <div class="mt-8 border-t border-slate-100 pt-6">
                <h2 class="text-xs font-black uppercase tracking-[0.2em] text-jasdun-green">Kategori</h2>
                <div class="mt-4 space-y-3 text-sm text-slate-700">
                    @foreach ($categories as $category)
                    <label class="flex cursor-pointer items-center gap-3">
                        <input type="checkbox" value="{{ $category->id }}" class="categoryFilter accent-jasdun-green">
                        {{ $category->name }}
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="mt-8 border-t border-slate-100 pt-6">
                <h2 class="text-xs font-black uppercase tracking-[0.2em] text-jasdun-green">Rentang Harga</h2>
                <div class="mt-4 space-y-3 text-sm text-slate-700">
                    <label class="flex cursor-pointer items-center gap-3">
                        <input name="price" type="radio" value="250-500" class="priceFilter accent-jasdun-green">
                        Rp 250rb - 500rb
                    </label>

                    <label class="flex cursor-pointer items-center gap-3">
                        <input name="price" type="radio" value="500-1000" class="priceFilter accent-jasdun-green">
                        Rp 500rb - 1jt
                    </label>

                    <label class="flex cursor-pointer items-center gap-3">
                        <input name="price" type="radio" value="1000" class="priceFilter accent-jasdun-green">
                        &gt; Rp 1jt
                    </label>
                </div>
            </div>

            <button id="resetFilter"
                class="mt-8 w-full bg-slate-100 px-5 py-3 text-xs font-black uppercase tracking-widest text-slate-700 transition hover:bg-jasdun-green hover:text-white">
                Reset Filter
            </button>
        </aside>

        <!-- Product Area -->
        <section>
            <!-- Header Product -->
            <div class="mb-6 flex flex-col gap-4 border-b border-slate-200 pb-5 md:flex-row md:items-center md:justify-between">
                <div>
                    <p id="resultText" class="text-sm font-semibold text-slate-600">
                        Menampilkan {{ $products->count() }} Produk Premium Terbaru
                    </p>
                    <h2 class="mt-2 font-display text-3xl font-bold text-jasdun-green">
                        Produk Premium Terbaru
                    </h2>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold uppercase tracking-widest text-slate-500">Urutkan</span>
                    <select id="sortSelect"
                        class="border border-slate-200 bg-white px-4 py-3 text-sm font-semibold outline-none focus:border-jasdun-green">
                        <option value="newest">Terbaru</option>
                        <option value="low">Harga Terendah</option>
                        <option value="high">Harga Tertinggi</option>
                        <option value="name">Nama A-Z</option>
                    </select>
                </div>
            </div>

            <!-- Product Grid -->
            <div id="productGrid" class="grid gap-7 sm:grid-cols-2 xl:grid-cols-3">
                @forelse ($products as $product)
                <article
                    class="product-card group overflow-hidden bg-white shadow-premium ring-1 ring-slate-100 transition hover:-translate-y-1 hover:shadow-xl"
                    data-index="{{ $loop->index }}"
                    data-name="{{ strtolower($product->name) }}"
                    data-category="{{ $product->category_id ?? '' }}"
                    data-type="{{ strtolower($product->type) }}"
                    data-price="{{ $product->price }}">
                    <div class="product-art relative h-64 overflow-hidden bg-jasdun-green">
                        <!-- Badge -->
                        <span class="absolute left-4 top-4 z-10 bg-jasdun-gold px-3 py-1 text-[10px] font-black uppercase tracking-widest text-jasdun-green">
                            {{ $product->badge }}
                        </span>
                        @php
                        $firstImage = $product->images->first();
                        $imageUrl = null;

                        if ($firstImage && $firstImage->image_path) {
                        $path = ltrim($firstImage->image_path, '/');

                        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                        $imageUrl = $path;
                        } elseif (str_starts_with($path, 'storage/')) {
                        $imageUrl = asset($path);
                        } else {
                        $imageUrl = asset('storage/' . $path);
                        }
                        }
                        @endphp

                        <!-- Product Image -->
                        <div class="h-full w-full overflow-hidden">
                            @if($imageUrl)
                            <img src="{{ $imageUrl }}"
                                alt="Parcel Lebaran {{ $product->name }} OM JASDUN"
                                loading="lazy"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                            @else
                            <!-- Fallback jika tidak ada gambar -->
                            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-jasdun-green to-jasdun-green2">
                                <span class="text-6xl text-white/50">🎁</span>
                            </div>
                            @endif
                        </div>

                        <!-- Overlay gradient untuk teks -->
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/60 to-transparent p-4 opacity-0 transition group-hover:opacity-100">
                            <p class="text-xs font-semibold text-white">{{ $product->type }}</p>
                        </div>
                    </div>

                    <div class="p-6">
                        <p class="text-[11px] font-black uppercase tracking-[0.25em] text-jasdun-gold">
                            {{ $product->type }}
                        </p>

                        <h3 class="mt-2 min-h-[62px] font-display text-2xl font-bold leading-tight text-jasdun-green">
                            {{ $product->name }}
                        </h3>

                        <p class="mt-3 line-clamp-2 min-h-[52px] text-sm leading-7 text-slate-600">
                            {{ $product->description }}
                        </p>

                        <p class="mt-4 font-display text-3xl font-black text-jasdun-green">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>

                        <div class="mt-5 grid grid-cols-[1fr_44px] gap-2">
                            <a href="{{ route('product.detail', $product->id) }}"
                                class="border-2 border-jasdun-green px-5 py-2 text-center text-xs font-black uppercase tracking-widest text-jasdun-green transition hover:bg-jasdun-green hover:text-white">
                                Detail
                            </a>

                            <button class="bg-jasdun-green text-lg text-white transition hover:bg-jasdun-green2"
                                aria-label="Tambah ke keranjang">
                                🛒
                            </button>
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-full border border-dashed border-slate-300 bg-white p-10 text-center">
                    <h3 class="font-display text-2xl font-bold text-jasdun-green">Produk belum tersedia</h3>
                    <p class="mt-2 text-slate-600">Silakan tambahkan data produk terlebih dahulu.</p>
                </div>
                @endforelse
            </div>

            <!-- Empty Result -->
            <div id="emptyResult" class="mt-8 hidden border border-dashed border-slate-300 bg-white p-10 text-center">
                <h3 class="font-display text-2xl font-bold text-jasdun-green">Produk tidak ditemukan</h3>
                <p class="mt-2 text-slate-600">Coba ubah kata kunci, kategori, atau rentang harga.</p>
            </div>

            <!-- Pagination Dummy -->
            <div class="mt-10 flex flex-col items-center justify-between gap-5 border-t border-slate-200 pt-6 md:flex-row">
                <p id="pageInfo" class="text-sm text-slate-500">
                    Menampilkan {{ $products->count() }} dari {{ $products->count() }} produk
                </p>

                <div class="flex items-center gap-2">
                    <button class="grid h-10 w-10 place-items-center border border-slate-200 text-slate-500 hover:bg-white">‹</button>
                    <button class="grid h-10 w-10 place-items-center bg-jasdun-green font-bold text-white">1</button>
                    <button class="grid h-10 w-10 place-items-center border border-slate-200 bg-white text-slate-700 hover:bg-jasdun-cream">›</button>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
    const productGrid = document.getElementById('productGrid');
    const productCards = [...document.querySelectorAll('.product-card')];

    const resultText = document.getElementById('resultText');
    const pageInfo = document.getElementById('pageInfo');
    const emptyResult = document.getElementById('emptyResult');

    const searchInput = document.getElementById('searchInput');
    const navSearch = document.getElementById('navSearch');
    const categoryFilters = [...document.querySelectorAll('.categoryFilter')];
    const priceFilters = [...document.querySelectorAll('.priceFilter')];
    const sortSelect = document.getElementById('sortSelect');
    const resetFilter = document.getElementById('resetFilter');

    function getSelectedPrice() {
        const selected = priceFilters.find((item) => item.checked);
        return selected ? selected.value : '';
    }

    function sortCards(cards) {
        const sortValue = sortSelect.value;

        return cards.sort((a, b) => {
            const priceA = parseInt(a.dataset.price || 0);
            const priceB = parseInt(b.dataset.price || 0);
            const nameA = a.dataset.name || '';
            const nameB = b.dataset.name || '';
            const indexA = parseInt(a.dataset.index || 0);
            const indexB = parseInt(b.dataset.index || 0);

            if (sortValue === 'low') return priceA - priceB;
            if (sortValue === 'high') return priceB - priceA;
            if (sortValue === 'name') return nameA.localeCompare(nameB);

            return indexA - indexB;
        });
    }

    function applyFilters() {
        const keyword = (searchInput.value || navSearch?.value || '').trim().toLowerCase();

        const selectedCategories = categoryFilters
            .filter((item) => item.checked)
            .map((item) => item.value);

        const selectedPrice = getSelectedPrice();

        let visibleCards = [];

        productCards.forEach((card) => {
            const name = card.dataset.name || '';
            const category = card.dataset.category || '';
            const type = card.dataset.type || '';
            const price = parseInt(card.dataset.price || 0);

            const matchKeyword =
                name.includes(keyword) ||
                category.toLowerCase().includes(keyword) ||
                type.includes(keyword);

            const matchCategory =
                selectedCategories.length === 0 ||
                selectedCategories.includes(category);

            let matchPrice = true;

            if (selectedPrice === '250-500') {
                matchPrice = price >= 250000 && price <= 500000;
            }

            if (selectedPrice === '500-1000') {
                matchPrice = price > 500000 && price <= 1000000;
            }

            if (selectedPrice === '1000') {
                matchPrice = price > 1000000;
            }

            const isVisible = matchKeyword && matchCategory && matchPrice;

            card.classList.toggle('hidden', !isVisible);

            if (isVisible) {
                visibleCards.push(card);
            }
        });

        sortCards(visibleCards).forEach((card) => {
            productGrid.appendChild(card);
        });

        emptyResult.classList.toggle('hidden', visibleCards.length !== 0);

        resultText.textContent = `Menampilkan ${visibleCards.length} dari ${productCards.length} Produk Premium`;

        pageInfo.textContent = visibleCards.length ?
            `Menampilkan ${visibleCards.length} dari ${productCards.length} produk` :
            'Tidak ada produk yang cocok';
    }

    searchInput.addEventListener('input', () => {
        if (navSearch) navSearch.value = searchInput.value;
        applyFilters();
    });

    if (navSearch) {
        navSearch.addEventListener('input', () => {
            searchInput.value = navSearch.value;
            applyFilters();
        });
    }

    categoryFilters.forEach((input) => input.addEventListener('change', applyFilters));
    priceFilters.forEach((input) => input.addEventListener('change', applyFilters));
    sortSelect.addEventListener('change', applyFilters);

    resetFilter.addEventListener('click', () => {
        searchInput.value = '';

        if (navSearch) {
            navSearch.value = '';
        }

        categoryFilters.forEach((input) => input.checked = false);
        priceFilters.forEach((input) => input.checked = false);

        sortSelect.value = 'newest';

        applyFilters();
    });

    applyFilters();
</script>

@endsection