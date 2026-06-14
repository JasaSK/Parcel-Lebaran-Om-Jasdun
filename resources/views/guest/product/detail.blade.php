@extends('guest.layouts.master')

@php
use Illuminate\Support\Str;

function productImageUrl($imagePath)
{
if (!$imagePath) {
return asset('images/logo-omjasdun1.png');
}

$path = ltrim($imagePath, '/');

if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
$url = $path;
} elseif (str_starts_with($path, 'storage/')) {
$url = asset($path);
} else {
$url = asset('storage/' . $path);
}

if (str_contains($url, 'res.cloudinary.com')) {
$url = str_replace('/upload/', '/upload/f_auto,q_auto,w_900/', $url);
}

return $url;
}

$firstImage = $product->images->first();

$mainImage = $firstImage
? productImageUrl($firstImage->image_path)
: asset('images/logo-omjasdun1.png');

$seoImage = $mainImage;
@endphp

@section('title', $product->name . ' - Parcel Lebaran OM JASDUN')
@section('meta_description', Str::limit(strip_tags($product->description ?? 'Parcel Lebaran premium dari OM JASDUN.'), 150))
@section('meta_keywords', $product->name . ', parcel lebaran, hampers premium, om jasdun')
@section('og_image', $seoImage)
@section('og_type', 'product')

@section('content')

<main class="bg-[#f8f5ef]">

    <!-- Breadcrumb -->
    <section class="border-b border-jasdun-gold/20 bg-white/80 px-5 py-4 backdrop-blur lg:px-8">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-2 text-sm font-semibold text-slate-500">
            <a href="/" class="transition hover:text-jasdun-green">Beranda</a>
            <span>/</span>
            <a href="{{ route('product.index') }}" class="transition hover:text-jasdun-green">Produk</a>
            <span>/</span>
            <span class="text-jasdun-green">{{ $product->name }}</span>
        </div>
    </section>

    <!-- Product Detail -->
    <section class="relative overflow-hidden px-5 py-12 lg:px-8 lg:py-16">
        <div class="pointer-events-none absolute -left-32 top-20 h-80 w-80 rounded-full bg-jasdun-gold/20 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-32 bottom-20 h-80 w-80 rounded-full bg-jasdun-green/20 blur-3xl"></div>

        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[1.05fr_.95fr] lg:items-start">

            <!-- Gallery -->
            <div class="lg:sticky lg:top-24">
                <div id="mainImage"
                    class="relative min-h-[420px] overflow-hidden rounded-[2rem] bg-gradient-to-br from-jasdun-green via-emerald-900 to-black p-6 shadow-2xl lg:min-h-[620px]">

                    <div class="absolute inset-0 opacity-20"
                        style="background-image: radial-gradient(circle at 20% 20%, #d6b25e 0, transparent 28%), radial-gradient(circle at 80% 70%, #ffffff 0, transparent 24%);">
                    </div>

                    <span
                        class="absolute left-6 top-6 z-10 rounded-full bg-jasdun-gold px-5 py-2 text-[11px] font-black uppercase tracking-[0.25em] text-jasdun-green shadow-lg">
                        Produk Pilihan
                    </span>

                    <span
                        class="absolute right-6 top-6 z-10 rounded-full bg-white/15 px-5 py-2 text-[11px] font-black uppercase tracking-[0.25em] text-white backdrop-blur">
                        Premium Hampers
                    </span>

                    <div class="relative z-10 flex h-full min-h-[380px] items-center justify-center rounded-[1.5rem] border border-white/20 bg-white/10 p-4 text-center backdrop-blur-md lg:min-h-[570px]">
                        @if($firstImage)
                        <img id="mainPhoto"
                            src="{{ $mainImage }}"
                            alt="Parcel Lebaran {{ $product->name }} OM JASDUN"
                            loading="lazy"
                            class="h-[360px] w-full rounded-[1.5rem] object-cover shadow-2xl md:h-[500px]">
                        @else
                        <div class="flex h-[360px] w-full items-center justify-center rounded-[1.5rem] bg-white/10 md:h-[500px]">
                            <span class="text-7xl text-white/50">🎁</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Thumbnail -->
                <div class="mt-5 grid grid-cols-4 gap-4">
                    @forelse($product->images as $index => $image)
                    <button type="button"
                        data-image="{{ productImageUrl($image->image_path) }}"
                        class="thumbBtn overflow-hidden rounded-2xl border-2 {{ $index == 0 ? 'border-jasdun-gold' : 'border-transparent' }} bg-white p-1 shadow-lg transition hover:-translate-y-1">

                        <img src="{{ productImageUrl($image->image_path) }}"
                            alt="{{ $product->name }}"
                            class="h-24 w-full rounded-xl object-cover">
                    </button>
                    @empty
                    <div class="col-span-4 rounded-2xl bg-white p-5 text-center text-sm font-semibold text-slate-500 shadow-lg">
                        Belum ada gambar produk.
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Info Produk -->
            <div class="overflow-hidden rounded-[2rem] bg-white shadow-2xl ring-1 ring-jasdun-gold/20">

                <div class="border-b border-slate-100 bg-gradient-to-r from-white to-jasdun-gold/10 p-7 lg:p-10">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="rounded-full bg-jasdun-green px-4 py-2 text-xs font-black uppercase tracking-[0.2em] text-white">
                            Hampers
                        </span>

                        <span class="rounded-full bg-jasdun-gold/20 px-4 py-2 text-xs font-black uppercase tracking-[0.2em] text-jasdun-green">
                            Premium Collection
                        </span>
                    </div>

                    <h1 class="mt-6 font-display text-4xl font-black leading-tight text-jasdun-green md:text-6xl">
                        {{ $product->name }}
                    </h1>

                    <div class="mt-5 flex flex-wrap items-center gap-3 text-sm font-semibold text-slate-600">
                        <span class="text-yellow-500">★★★★★</span>
                        <span>4.9</span>
                        <span class="text-slate-300">|</span>
                        <span>Produk tersedia</span>
                        <span class="text-slate-300">|</span>
                        <span>Stok terbatas</span>
                    </div>

                    <div class="mt-6 flex flex-wrap items-end gap-3">
                        <p class="font-display text-4xl font-black text-jasdun-green">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>

                    <p class="mt-5 max-w-xl text-sm leading-7 text-slate-600">
                        {{ $product->description ?? 'Produk hampers premium dengan kemasan elegan, cocok untuk hadiah keluarga, rekan kerja, klien bisnis, atau orang spesial.' }}
                    </p>
                </div>

                <div class="p-7 lg:p-10">

                    <!-- Keunggulan -->
                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl bg-[#f8f5ef] p-4">
                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white shadow">
                                🚚
                            </div>
                            <p class="mt-3 text-sm font-black text-jasdun-green">Pengiriman</p>
                            <p class="mt-1 text-xs leading-5 text-slate-500">Seluruh Indonesia</p>
                        </div>

                        <div class="rounded-2xl bg-[#f8f5ef] p-4">
                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white shadow">
                                🎀
                            </div>
                            <p class="mt-3 text-sm font-black text-jasdun-green">Packaging</p>
                            <p class="mt-1 text-xs leading-5 text-slate-500">Premium & elegan</p>
                        </div>

                        <div class="rounded-2xl bg-[#f8f5ef] p-4">
                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white shadow">
                                ⭐
                            </div>
                            <p class="mt-3 text-sm font-black text-jasdun-green">Kualitas</p>
                            <p class="mt-1 text-xs leading-5 text-slate-500">Selected grade</p>
                        </div>
                    </div>

                    <!-- Deskripsi Produk -->
                    <div class="mt-8 rounded-[1.5rem] border border-slate-200 p-6">
                        <h2 class="text-sm font-black uppercase tracking-[0.22em] text-jasdun-green">
                            Detail Produk
                        </h2>

                        <p class="mt-5 text-sm leading-7 text-slate-700">
                            {{ $product->description ?? 'Produk ini dibuat dengan tampilan premium dan cocok digunakan sebagai hadiah untuk momen spesial.' }}
                        </p>
                    </div>

                    <!-- Form -->
                    <form class="mt-8 space-y-5" onsubmit="event.preventDefault(); showCartToast();">

                        <div>
                            <label class="text-sm font-black uppercase tracking-[0.18em] text-slate-700">
                                Jumlah Pesanan
                            </label>

                            <div class="mt-3 flex w-fit overflow-hidden rounded-full border border-slate-200 bg-white">
                                <button type="button" onclick="changeQty(-1)"
                                    class="grid h-12 w-12 place-items-center text-xl font-black text-jasdun-green hover:bg-slate-100">
                                    −
                                </button>

                                <input id="qtyInput" type="number" value="1" min="1"
                                    class="h-12 w-16 border-x border-slate-200 text-center font-black outline-none">

                                <button type="button" onclick="changeQty(1)"
                                    class="grid h-12 w-12 place-items-center text-xl font-black text-jasdun-green hover:bg-slate-100">
                                    +
                                </button>
                            </div>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-2">
                            <button type="submit"
                                class="rounded-full bg-jasdun-green px-6 py-4 text-sm font-black uppercase tracking-[0.18em] text-white shadow-lg transition hover:-translate-y-1 hover:bg-jasdun-green2">
                                🛒 Keranjang
                            </button>

                            <a href="https://wa.me/6285935359648?text=Halo%20OM%20JASDUN,%20saya%20ingin%20pesan%20{{ urlencode($product->name) }}"
                                class="rounded-full border-2 border-jasdun-green px-6 py-4 text-center text-sm font-black uppercase tracking-[0.18em] text-jasdun-green transition hover:-translate-y-1 hover:bg-jasdun-green hover:text-white">
                                💬 WhatsApp
                            </a>
                        </div>
                    </form>

                    <!-- Note -->
                    <div class="mt-8 rounded-[1.5rem] bg-jasdun-green p-6 text-white">
                        <p class="text-sm font-black uppercase tracking-[0.22em] text-jasdun-gold2">
                            Catatan Pemesanan
                        </p>
                        <p class="mt-3 text-sm leading-7 text-white/85">
                            Untuk pesanan custom nama, kartu ucapan, atau jumlah besar, silakan hubungi admin melalui WhatsApp.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

<script>
    const mainPhoto = document.getElementById('mainPhoto');
    const thumbButtons = document.querySelectorAll('.thumbBtn');

    thumbButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const image = button.dataset.image;

            if (mainPhoto && image) {
                mainPhoto.src = image;
            }

            thumbButtons.forEach(btn => {
                btn.classList.remove('border-jasdun-gold');
                btn.classList.add('border-transparent');
            });

            button.classList.remove('border-transparent');
            button.classList.add('border-jasdun-gold');
        });
    });

    function changeQty(value) {
        const input = document.getElementById('qtyInput');
        let currentValue = parseInt(input.value) || 1;
        currentValue += value;

        if (currentValue < 1) {
            currentValue = 1;
        }

        input.value = currentValue;
    }
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Product",
        "name": "{{ $product->name }}",
        "description": "{{ strip_tags($product->description ?? 'Parcel Lebaran premium dari OM JASDUN.') }}",
        "image": "{{ $seoImage }}",
        "brand": {
            "@type": "Brand",
            "name": "OM JASDUN"
        },
        "offers": {
            "@type": "Offer",
            "url": "{{ route('product.detail', $product->id) }}",
            "priceCurrency": "IDR",
            "price": "{{ $product->price }}",
            "availability": "https://schema.org/InStock"
        }
    }
</script>
@endsection