@extends('layouts.master')

@section('content')


<!-- Content -->
<main class="mx-auto max-w-7xl px-5 py-12 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-[260px_1fr]">
        <!-- Filter Sidebar -->
        <aside id="kategori" class="h-fit border border-slate-200 bg-white p-6 shadow-sm lg:sticky lg:top-24">
            <div>
                <h2 class="text-xs font-black uppercase tracking-[0.2em] text-jasdun-green">Pencarian</h2>
                <label class="relative mt-4 block">
                    <input id="searchInput" type="search" placeholder="Cari hampers..." class="w-full border border-slate-200 bg-white px-4 py-3 pr-10 text-sm outline-none focus:border-jasdun-green" />
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400">⌕</span>
                </label>
            </div>

            <div class="mt-8 border-t border-slate-100 pt-6">
                <h2 class="text-xs font-black uppercase tracking-[0.2em] text-jasdun-green">Kategori</h2>
                <div class="mt-4 space-y-3 text-sm text-slate-700">
                    <label class="flex cursor-pointer items-center gap-3"><input type="checkbox" value="Premium Series" class="categoryFilter accent-jasdun-green"> Premium Series</label>
                    <label class="flex cursor-pointer items-center gap-3"><input type="checkbox" value="Cookie Series" class="categoryFilter accent-jasdun-green"> Cookie Series</label>
                    <label class="flex cursor-pointer items-center gap-3"><input type="checkbox" value="Grand Series" class="categoryFilter accent-jasdun-green"> Grand Series</label>
                    <label class="flex cursor-pointer items-center gap-3"><input type="checkbox" value="Budget Series" class="categoryFilter accent-jasdun-green"> Budget Series</label>
                </div>
            </div>

            <div class="mt-8 border-t border-slate-100 pt-6">
                <h2 class="text-xs font-black uppercase tracking-[0.2em] text-jasdun-green">Rentang Harga</h2>
                <div class="mt-4 space-y-3 text-sm text-slate-700">
                    <label class="flex cursor-pointer items-center gap-3"><input name="price" type="radio" value="250-500" class="priceFilter accent-jasdun-green"> Rp 250rb - 500rb</label>
                    <label class="flex cursor-pointer items-center gap-3"><input name="price" type="radio" value="500-1000" class="priceFilter accent-jasdun-green"> Rp 500rb - 1jt</label>
                    <label class="flex cursor-pointer items-center gap-3"><input name="price" type="radio" value="1000" class="priceFilter accent-jasdun-green"> &gt; Rp 1jt</label>
                </div>
            </div>

            <button id="resetFilter" class="mt-8 w-full bg-slate-100 px-5 py-3 text-xs font-black uppercase tracking-widest text-slate-700 transition hover:bg-jasdun-green hover:text-white">Reset Filter</button>
        </aside>

        <!-- Product Area -->
        <section>
            <div class="mb-6 flex flex-col gap-4 border-b border-slate-200 pb-5 md:flex-row md:items-center md:justify-between">
                <div>
                    <p id="resultText" class="text-sm font-semibold text-slate-600">Menampilkan 12 Produk Premium Terbaru</p>
                    <h2 class="mt-2 font-display text-3xl font-bold text-jasdun-green">Produk Premium Terbaru</h2>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold uppercase tracking-widest text-slate-500">Urutkan</span>
                    <select id="sortSelect" class="border border-slate-200 bg-white px-4 py-3 text-sm font-semibold outline-none focus:border-jasdun-green">
                        <option value="newest">Terbaru</option>
                        <option value="low">Harga Terendah</option>
                        <option value="high">Harga Tertinggi</option>
                        <option value="name">Nama A-Z</option>
                    </select>
                </div>
            </div>

            <div id="productGrid" class="grid gap-7 sm:grid-cols-2 xl:grid-cols-3"></div>

            <div class="mt-10 flex flex-col items-center justify-between gap-5 border-t border-slate-200 pt-6 md:flex-row">
                <p id="pageInfo" class="text-sm text-slate-500">Menampilkan halaman 1 dari 3</p>
                <div class="flex items-center gap-2">
                    <button class="grid h-10 w-10 place-items-center border border-slate-200 text-slate-500 hover:bg-white">‹</button>
                    <button class="grid h-10 w-10 place-items-center bg-jasdun-green font-bold text-white">1</button>
                    <button class="grid h-10 w-10 place-items-center border border-slate-200 bg-white font-bold text-slate-700 hover:bg-jasdun-cream">2</button>
                    <button class="grid h-10 w-10 place-items-center border border-slate-200 bg-white font-bold text-slate-700 hover:bg-jasdun-cream">3</button>
                    <button class="grid h-10 w-10 place-items-center border border-slate-200 bg-white text-slate-700 hover:bg-white">›</button>
                </div>
            </div>
        </section>
    </div>
</main>

<!-- Footer -->
<footer class="bg-jasdun-green px-5 py-14 text-white lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-10 md:grid-cols-4">
        <div>
            <h2 class="font-display text-4xl font-bold text-jasdun-gold2">OM<br>JASDUN</h2>
            <p class="mt-4 text-sm leading-7 text-white/70">Butik hampers premium yang mengedepankan kualitas dan estetika modern dalam tradisi berbagi kebahagiaan.</p>
            <div class="mt-5 flex gap-3 text-jasdun-gold2">
                <span>☏</span><span>✉</span><span>▣</span>
            </div>
        </div>

        <div>
            <h3 class="mb-4 text-sm font-black uppercase tracking-widest text-jasdun-gold2">Tautan Cepat</h3>
            <ul class="space-y-3 text-sm text-white/70">
                <li><a href="#" class="hover:text-white">Tentang Kami</a></li>
                <li><a href="#" class="hover:text-white">Kebijakan Privasi</a></li>
                <li><a href="#" class="hover:text-white">Syarat & Ketentuan</a></li>
            </ul>
        </div>

        <div>
            <h3 class="mb-4 text-sm font-black uppercase tracking-widest text-jasdun-gold2">Bantuan</h3>
            <ul class="space-y-3 text-sm text-white/70">
                <li><a href="#" class="hover:text-white">FAQ</a></li>
                <li><a href="#" class="hover:text-white">Konfirmasi Pembayaran</a></li>
                <li><a href="#" class="hover:text-white">Status Pesanan</a></li>
            </ul>
        </div>

        <div>
            <h3 class="mb-4 text-sm font-black uppercase tracking-widest text-jasdun-gold2">Newsletter</h3>
            <p class="text-sm leading-7 text-white/70">Dapatkan penawaran eksklusif setiap bulan Ramadan.</p>
            <form class="mt-5 flex overflow-hidden border border-white/20">
                <input type="email" placeholder="Email Anda" class="min-w-0 flex-1 bg-white/10 px-4 py-3 text-sm text-white placeholder:text-white/50 outline-none" />
                <button class="bg-jasdun-gold px-4 text-sm font-black text-jasdun-green">Gabung</button>
            </form>
        </div>
    </div>
    <div class="mx-auto mt-12 max-w-7xl border-t border-white/10 pt-6 text-center text-xs text-white/45">© 2024 OM JASDUN Premium Hampers. All Rights Reserved.</div>
</footer>

<script>
    const products = [{
            name: 'Mubarak Grandeur',
            category: 'Premium Series',
            badge: 'Grand Series',
            type: 'Hampers Premium',
            description: 'Edisi eksklusif dengan wadah kotak beludru, kurma pilihan, dan cookies premium.',
            price: 1250000,
            icon: '🎁'
        },
        {
            name: 'Classic Nastar Gold',
            category: 'Cookie Series',
            badge: 'Cookie Series',
            type: 'Signature Cookies',
            description: 'Nastar premium dengan selai nanas asli pilihan dan kemasan emas elegan.',
            price: 350000,
            icon: '🍪'
        },
        {
            name: 'Royal Fitri Basket',
            category: 'Grand Series',
            badge: 'Grand Series',
            type: 'Family Selection',
            description: 'Keranjang rotan anyam manual berisi koleksi cemilan dan minuman terbaik.',
            price: 875000,
            icon: '🧺'
        },
        {
            name: 'Simple Serenity',
            category: 'Budget Series',
            badge: 'Budget Series',
            type: 'Essential Gift',
            description: 'Pilihan hemat namun tetap berkesan dengan packaging rapi dan elegan.',
            price: 275000,
            icon: '✨'
        },
        {
            name: 'Quartet Delight',
            category: 'Cookie Series',
            badge: 'Cookie Series',
            type: 'Cookie Box',
            description: 'Paket 4 toples kue kering favorit keluarga: nastar, kastengel, putri salju, dan lidah kucing.',
            price: 585000,
            icon: '🍯'
        },
        {
            name: 'Emerald Sultan',
            category: 'Premium Series',
            badge: 'Premium Series',
            type: 'Luxury Series',
            description: 'Hampers termewah kami dengan koleksi premium untuk rekan bisnis dan keluarga.',
            price: 2450000,
            icon: '💎'
        },
        {
            name: 'Batik Heritage Tray',
            category: 'Grand Series',
            badge: 'Grand Series',
            type: 'Cultural Selection',
            description: 'Nampan kayu ukir berisi kue tradisional dan sentuhan batik eksklusif.',
            price: 720000,
            icon: '☕'
        },
        {
            name: 'Tea Ceremony Set',
            category: 'Premium Series',
            badge: 'Premium Series',
            type: 'Wellness Gift',
            description: 'Set keramik teh mewah dengan motif geometris dan pilihan teh premium.',
            price: 1100000,
            icon: '🍵'
        },
        {
            name: 'Safiyah Prayer Gift',
            category: 'Premium Series',
            badge: 'Premium Series',
            type: 'Gift Box',
            description: 'Gift box berisi sajadah eksklusif, tasbih, dan kartu ucapan custom.',
            price: 1000000,
            icon: '🌙'
        },
        {
            name: 'Medina Cookies Pack',
            category: 'Cookie Series',
            badge: 'Cookie Series',
            type: 'Cookies Pack',
            description: 'Koleksi cookies klasik untuk keluarga dengan box berwarna emerald.',
            price: 650000,
            icon: '🥮'
        },
        {
            name: 'Berkah Sembako Box',
            category: 'Budget Series',
            badge: 'Budget Series',
            type: 'Sembako Package',
            description: 'Paket sembako cantik untuk berbagi kebahagiaan di bulan Ramadan.',
            price: 450000,
            icon: '📦'
        },
        {
            name: 'Al-Aqsa Grand Hamper',
            category: 'Grand Series',
            badge: 'Grand Series',
            type: 'Exclusive Hamper',
            description: 'Hamper besar dengan kombinasi cookies, tea set, madu, dan hiasan lantern.',
            price: 2250000,
            icon: '🕌'
        }
    ];

    const formatRupiah = (value) => new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(value).replace('IDR', 'Rp');

    const productGrid = document.getElementById('productGrid');
    const resultText = document.getElementById('resultText');
    const pageInfo = document.getElementById('pageInfo');
    const searchInput = document.getElementById('searchInput');
    const navSearch = document.getElementById('navSearch');
    const categoryFilters = [...document.querySelectorAll('.categoryFilter')];
    const priceFilters = [...document.querySelectorAll('.priceFilter')];
    const sortSelect = document.getElementById('sortSelect');
    const resetFilter = document.getElementById('resetFilter');

    function productCard(product) {
        return `
        <article class="group overflow-hidden bg-white shadow-premium ring-1 ring-slate-100 transition hover:-translate-y-1 hover:shadow-xl">
          <div class="product-art relative h-56 overflow-hidden">
            <span class="absolute left-4 top-4 bg-jasdun-gold px-3 py-1 text-[10px] font-black uppercase tracking-widest text-jasdun-green">${product.badge}</span>
            <div class="absolute inset-x-8 bottom-6 rounded-2xl border border-jasdun-gold/30 bg-white/10 p-6 text-center backdrop-blur-sm transition group-hover:scale-105">
              <div class="text-6xl">${product.icon}</div>
            </div>
          </div>
          <div class="p-6">
            <p class="text-[11px] font-black uppercase tracking-[0.25em] text-jasdun-gold">${product.type}</p>
            <h3 class="mt-2 min-h-[62px] font-display text-2xl font-bold leading-tight text-jasdun-green">${product.name}</h3>
            <p class="mt-3 line-clamp-2 min-h-[52px] text-sm leading-7 text-slate-600">${product.description}</p>
            <p class="mt-4 font-display text-3xl font-black text-jasdun-green">${formatRupiah(product.price)}</p>
            <div class="mt-5 grid grid-cols-[1fr_44px] gap-2">
              <a href="#" class="border-2 border-jasdun-green px-5 py-2 text-center text-xs font-black uppercase tracking-widest text-jasdun-green transition hover:bg-jasdun-green hover:text-white">Detail</a>
              <button class="bg-jasdun-green text-lg text-white transition hover:bg-jasdun-green2" aria-label="Tambah ke keranjang">🛒</button>
            </div>
          </div>
        </article>
      `;
    }

    function getSelectedPrice() {
        const selected = priceFilters.find((item) => item.checked);
        return selected ? selected.value : '';
    }

    function applyFilters() {
        const keyword = (searchInput.value || navSearch.value || '').trim().toLowerCase();
        const selectedCategories = categoryFilters.filter((item) => item.checked).map((item) => item.value);
        const selectedPrice = getSelectedPrice();
        let filtered = products.filter((product) => {
            const matchKeyword = product.name.toLowerCase().includes(keyword) || product.category.toLowerCase().includes(keyword) || product.type.toLowerCase().includes(keyword);
            const matchCategory = selectedCategories.length === 0 || selectedCategories.includes(product.category);
            let matchPrice = true;
            if (selectedPrice === '250-500') matchPrice = product.price >= 250000 && product.price <= 500000;
            if (selectedPrice === '500-1000') matchPrice = product.price > 500000 && product.price <= 1000000;
            if (selectedPrice === '1000') matchPrice = product.price > 1000000;
            return matchKeyword && matchCategory && matchPrice;
        });

        if (sortSelect.value === 'low') filtered.sort((a, b) => a.price - b.price);
        if (sortSelect.value === 'high') filtered.sort((a, b) => b.price - a.price);
        if (sortSelect.value === 'name') filtered.sort((a, b) => a.name.localeCompare(b.name));

        productGrid.innerHTML = filtered.length ? filtered.map(productCard).join('') : `
        <div class="col-span-full border border-dashed border-slate-300 bg-white p-10 text-center">
          <h3 class="font-display text-2xl font-bold text-jasdun-green">Produk tidak ditemukan</h3>
          <p class="mt-2 text-slate-600">Coba ubah kata kunci, kategori, atau rentang harga.</p>
        </div>
      `;

        resultText.textContent = `Menampilkan ${filtered.length} dari ${products.length} Produk Premium`;
        pageInfo.textContent = filtered.length ? `Menampilkan 1-${filtered.length} dari ${products.length} produk` : 'Tidak ada produk yang cocok';
    }

    searchInput.addEventListener('input', () => {
        navSearch.value = searchInput.value;
        applyFilters();
    });

    navSearch.addEventListener('input', () => {
        searchInput.value = navSearch.value;
        applyFilters();
    });

    categoryFilters.forEach((input) => input.addEventListener('change', applyFilters));
    priceFilters.forEach((input) => input.addEventListener('change', applyFilters));
    sortSelect.addEventListener('change', applyFilters);

    resetFilter.addEventListener('click', () => {
        searchInput.value = '';
        navSearch.value = '';
        categoryFilters.forEach((input) => input.checked = false);
        priceFilters.forEach((input) => input.checked = false);
        sortSelect.value = 'newest';
        applyFilters();
    });

    applyFilters();
</script>

@endsection