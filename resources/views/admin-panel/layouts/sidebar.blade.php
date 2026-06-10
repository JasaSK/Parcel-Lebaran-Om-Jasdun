<!-- Sidebar -->
<aside class="h-fit border border-slate-200 bg-white p-6 shadow-sm lg:sticky lg:top-24">
    <div class="mb-8">
        <h2 class="font-display text-2xl font-black text-jasdun-green">
            OM JASDUN
        </h2>
        <p class="mt-1 text-xs font-bold uppercase tracking-[0.25em] text-jasdun-gold">
            Admin Panel
        </p>
    </div>

    <nav class="space-y-2 text-sm font-bold text-slate-700">

        <a href="{{ route('dashboard') }}"
            class="flex items-center justify-between px-4 py-3 transition 
            {{ request()->routeIs('dashboard') ? 'bg-jasdun-green text-white' : 'hover:bg-jasdun-cream hover:text-jasdun-green' }}">
            <span>Dashboard</span>
            <span>›</span>
        </a>

        <a href="{{ route('admin.category.index') }}"
            class="flex items-center justify-between px-4 py-3 transition 
            {{ request()->routeIs('admin.category.*') ? 'bg-jasdun-green text-white' : 'hover:bg-jasdun-cream hover:text-jasdun-green' }}">
            <span>Kategori Produk</span>
            <span>›</span>
        </a>

        <a href="{{ route('admin.product.index') }}"
            class="flex items-center justify-between px-4 py-3 transition 
            {{ request()->routeIs('admin.product.*') ? 'bg-jasdun-green text-white' : 'hover:bg-jasdun-cream hover:text-jasdun-green' }}">
            <span>Produk</span>
            <span>›</span>
        </a>

        <form action="{{ route('logout') }}" method="POST">

            @csrf
            <button type="submit"
                class="flex w-full items-center justify-between px-4 py-3 transition hover:bg-jasdun-cream hover:text-jasdun-green" >
                <span>Logout</span>
                <span>›</span>
            </button>
        </form>

        <!-- <a href="#"
            class="flex items-center justify-between px-4 py-3 transition hover:bg-jasdun-cream hover:text-jasdun-green">
            <span>Kontak Toko</span>
            <span>›</span>
        </a> -->
    </nav>

    <!-- <div class="mt-10 border-t border-slate-100 pt-6">
        <p class="text-xs font-bold uppercase tracking-widest text-slate-400">
            Login sebagai
        </p>

        <div class="mt-4 flex items-center gap-3">
            <div class="grid h-11 w-11 place-items-center rounded-full bg-jasdun-green font-black text-white">
                AJ
            </div>
            <div>
                <p class="font-bold text-jasdun-green">Admin Jasdun</p>
                <p class="text-xs text-slate-500">Super Admin</p>
            </div>
        </div>

        <form action="" method="POST">
            @csrf
            <button type="submit"
                class="mt-6 w-full bg-slate-100 px-5 py-3 text-xs font-black uppercase tracking-widest text-slate-700 transition hover:bg-red-600 hover:text-white">
                Logout
            </button>
        </form>
    </div> -->
</aside>