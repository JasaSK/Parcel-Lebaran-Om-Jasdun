<!-- Navbar -->
<header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/95 backdrop-blur">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-3 lg:px-8">
        <a href="{{ route('landing') }}"
            class="flex items-center gap-3 transition hover:opacity-90">

            <img src="{{ asset('images/logo-omjasdun.png') }}"
                alt="Logo OM JASDUN"
                class="h-12 w-12 rounded-full object-cover ring-2 ring-jasdun-gold">

            <span class="font-display text-2xl font-bold tracking-wide text-jasdun-green transition hover:text-jasdun-gold">
                OM JASDUN
            </span>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden items-center gap-8 text-sm font-semibold md:flex">

            <a href="{{ route('landing') }}"
                class="relative py-2 transition-colors duration-200
        {{ request()->routeIs('landing') 
            ? 'text-jasdun-green after:w-full' 
            : 'text-slate-700 hover:text-jasdun-green after:w-0 hover:after:w-full' }}
        after:absolute after:bottom-0 after:left-0 after:h-[2px] after:bg-jasdun-gold after:transition-all after:duration-300">
                Beranda
            </a>

            <a href="{{ route('product.index') }}"
                class="relative py-2 transition-colors duration-200
        {{ request()->routeIs('product.index') || request()->routeIs('product.*')
            ? 'text-jasdun-green after:w-full' 
            : 'text-slate-700 hover:text-jasdun-green after:w-0 hover:after:w-full' }}
        after:absolute after:bottom-0 after:left-0 after:h-[2px] after:bg-jasdun-gold after:transition-all after:duration-300">
                Produk
            </a>

            <a href="{{ route('landing') }}#kategori"
                class="relative py-2 text-slate-700 transition-colors duration-200 hover:text-jasdun-green
        after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-jasdun-gold after:transition-all after:duration-300 hover:after:w-full">
                Kategori
            </a>

            <a href="{{ route('landing') }}#order"
                class="relative py-2 text-slate-700 transition-colors duration-200 hover:text-jasdun-green
        after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-jasdun-gold after:transition-all after:duration-300 hover:after:w-full">
                Cara Pesan
            </a>

            <a href="{{ route('landing') }}#lokasi"
                class="relative py-2 text-slate-700 transition-colors duration-200 hover:text-jasdun-green
        after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-jasdun-gold after:transition-all after:duration-300 hover:after:w-full">
                Lokasi
            </a>

        </div>

        <!-- Right Menu -->
        <div class="hidden items-center gap-4 md:flex">
            <label class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">⌕</span>
                <input id="navSearch" type="search" placeholder="Cari parcel..."
                    class="w-56 border border-slate-200 bg-slate-50 py-2 pl-9 pr-3 text-sm outline-none transition focus:border-jasdun-green focus:bg-white" />
            </label>

            <button class="text-xl text-jasdun-green transition hover:-translate-y-0.5 hover:text-jasdun-gold" aria-label="Keranjang">
                🛒
            </button>

            <button class="text-xl text-jasdun-green transition hover:-translate-y-0.5 hover:text-jasdun-gold" aria-label="Akun">
                👤
            </button>

            <a href="https://wa.me/6281234567890"
                class="bg-jasdun-green px-6 py-2 text-sm font-bold text-white transition duration-200 hover:bg-jasdun-gold hover:text-jasdun-green">
                WhatsApp
            </a>
        </div>

        <!-- Mobile Menu -->
        <!-- Mobile Menu -->
        <details class="relative md:hidden">
            <summary
                class="flex h-11 min-w-20 cursor-pointer list-none items-center justify-center rounded-xl border border-slate-200 bg-white px-4 text-sm font-black text-jasdun-green shadow-sm transition active:scale-95">
                Menu
            </summary>

            <div class="fixed left-4 right-4 top-20 z-[9999] rounded-2xl border border-slate-200 bg-white p-4 shadow-2xl">
                <a href="{{ route('landing') }}"
                    class="block rounded-xl px-4 py-4 text-base font-bold text-slate-700 transition hover:bg-jasdun-cream hover:text-jasdun-green">
                    Beranda
                </a>

                <a href="{{ route('product.index') }}"
                    class="block rounded-xl px-4 py-4 text-base font-bold text-slate-700 transition hover:bg-jasdun-cream hover:text-jasdun-green">
                    Produk
                </a>

                <a href="{{ route('landing') }}#kategori"
                    class="block rounded-xl px-4 py-4 text-base font-bold text-slate-700 transition hover:bg-jasdun-cream hover:text-jasdun-green">
                    Kategori
                </a>

                <a href="{{ route('landing') }}#order"
                    class="block rounded-xl px-4 py-4 text-base font-bold text-slate-700 transition hover:bg-jasdun-cream hover:text-jasdun-green">
                    Cara Pesan
                </a>

                <a href="{{ route('landing') }}#lokasi"
                    class="block rounded-xl px-4 py-4 text-base font-bold text-slate-700 transition hover:bg-jasdun-cream hover:text-jasdun-green">
                    Lokasi
                </a>

                <a href="https://wa.me/6281234567890"
                    class="mt-3 block rounded-xl bg-jasdun-green px-4 py-4 text-center text-base font-black text-white transition hover:bg-jasdun-gold hover:text-jasdun-green">
                    WhatsApp
                </a>
            </div>
        </details>
    </nav>
</header>