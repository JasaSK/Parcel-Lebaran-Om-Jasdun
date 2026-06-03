<!-- Navbar -->
<header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/95 backdrop-blur">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-3 lg:px-8">
        <a href="{{ route('landing') }}"
            class="font-display text-2xl font-bold tracking-wide text-jasdun-green transition hover:text-jasdun-gold">
            OM JASDUN
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

            <a href="{{ route('landing') }}#testimoni"
                class="relative py-2 text-slate-700 transition-colors duration-200 hover:text-jasdun-green
        after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-jasdun-gold after:transition-all after:duration-300 hover:after:w-full">
                Testimoni
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
        <details class="relative md:hidden">
            <summary class="list-none rounded-md border px-3 py-2 text-sm font-bold text-jasdun-green transition hover:border-jasdun-green hover:bg-jasdun-green hover:text-white">
                Menu
            </summary>

            <div class="absolute right-0 mt-3 w-64 border bg-white p-4 shadow-xl">
                <a href="{{ route('landing') }}" class="block py-2 font-semibold transition hover:text-jasdun-green">
                    Beranda
                </a>

                <a href="{{ route('product.index') }}" class="block py-2 font-semibold text-jasdun-green">
                    Produk
                </a>

                <a href="#kategori" class="block py-2 font-semibold transition hover:text-jasdun-green">
                    Kategori
                </a>

                <a href="{{ route('landing') }}#order" class="block py-2 font-semibold transition hover:text-jasdun-green">
                    Cara Pesan
                </a>

                <a href="{{ route('landing') }}#testimoni" class="block py-2 font-semibold transition hover:text-jasdun-green">
                    Testimoni
                </a>

                <a href="https://wa.me/6281234567890"
                    class="mt-3 block bg-jasdun-green px-4 py-2 text-center font-bold text-white transition hover:bg-jasdun-gold hover:text-jasdun-green">
                    WhatsApp
                </a>
            </div>
        </details>
    </nav>
</header>