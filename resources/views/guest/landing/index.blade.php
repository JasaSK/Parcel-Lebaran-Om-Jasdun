@extends('guest.layouts.master')
@section('title', 'OM JASDUN - Parcel Lebaran Premium dan Hampers Eksklusif')
@section('meta_description', 'Lihat katalog parcel Lebaran OM JASDUN. Tersedia berbagai pilihan hampers premium dengan harga dan kategori yang bisa disesuaikan.')
@section('meta_keywords', 'katalog parcel, parcel lebaran premium, hampers om jasdun, produk parcel')
@section('og_image', asset('images/logo-omjasdun1.png'))
@section('content')
<!-- Plugin CSS: AOS Animation + Swiper Slider -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<style>
  .testimonial-swiper {
    padding: 0.5rem 0.5rem 3.5rem;
  }

  .testimonial-swiper .swiper-pagination-bullet-active {
    background: #c9a227;
  }

  .testimonial-swiper .swiper-button-next,
  .testimonial-swiper .swiper-button-prev {
    color: #0f3d2e;
  }

  .testimonial-swiper .swiper-button-next::after,
  .testimonial-swiper .swiper-button-prev::after {
    font-size: 1.4rem;
    font-weight: 900;
  }
</style>
<!-- Hero -->
<section id="home" class="luxury-pattern relative overflow-hidden text-white" data-aos="fade-down">
  <div class="absolute inset-0 opacity-10">
    <div class="mx-auto grid h-full max-w-7xl grid-cols-3">
      <div class="border-x border-white/30"></div>
      <div class="border-r border-white/30"></div>
      <div></div>
    </div>
  </div>

  <div class="relative mx-auto flex min-h-[520px] max-w-7xl flex-col items-center justify-center px-5 py-24 text-center lg:px-8">
    <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-jasdun-gold2">Edisi Terbatas Lebaran 2024</p>
    <h1 class="max-w-4xl font-display text-4xl font-bold leading-tight md:text-6xl">Parcel Lebaran OM JASDUN</h1>
    <p class="mt-5 max-w-2xl text-base leading-8 text-white/80 md:text-lg">Pilihan parcel lebaran terbaik untuk keluarga, sahabat, dan rekan kerja. Hadirkan kehangatan dan kemewahan di hari kemenangan.</p>

    <div class="mt-8 flex flex-col gap-4 sm:flex-row">
      <a href="#produk" class="bg-jasdun-gold px-8 py-3 text-sm font-black uppercase tracking-widest text-jasdun-green transition hover:bg-jasdun-gold2">Lihat Katalog</a>
      <a href="#contact" class="border border-jasdun-gold px-8 py-3 text-sm font-black uppercase tracking-widest text-jasdun-gold2 transition hover:bg-white hover:text-jasdun-green">Pesan Sekarang</a>
    </div>

    <div class="mt-14 text-2xl text-jasdun-gold2">⌄</div>
  </div>
</section>

<!-- Categories -->
<section id="kategori" class="mx-auto max-w-7xl px-5 py-16 lg:px-8" data-aos="fade-up">
  <div class="mb-10 text-center">
    <h2 class="font-display text-3xl font-bold text-jasdun-green md:text-4xl">Kategori Pilihan</h2>
  </div>

  <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($categories as $category)
    <article class="category-art group flex min-h-44 flex-col justify-end p-6 text-white shadow-premium transition hover:-translate-y-1" data-aos="zoom-in">
      <h3 class="font-display text-2xl font-bold">{{ $category->name }}</h3>
      <a href="#produk" class="mt-2 text-xs font-bold uppercase tracking-widest text-jasdun-gold2">Lihat Koleksi →</a>
    </article>
    @endforeach
  </div>
</section>

<!-- Best Seller Products -->
<section id="produk" class="bg-white py-16" data-aos="fade-up">
  <div class="mx-auto max-w-7xl px-5 lg:px-8">
    <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <p class="text-xs font-black uppercase tracking-[0.3em] text-jasdun-gold">
          Produk Pilihan
        </p>
        <h2 class="mt-3 font-display text-3xl font-bold text-jasdun-green md:text-4xl">
          Koleksi Terlaris
        </h2>
        <p class="mt-3 max-w-2xl text-slate-600">
          Kurasi parcel terbaik kami yang paling banyak diminati musim ini.
          Kualitas premium dengan sentuhan personal untuk momen spesial.
        </p>
      </div>

      <a href="{{ route('product.index') }}"
        class="text-sm font-bold uppercase tracking-widest text-jasdun-gold hover:text-jasdun-green">
        Semua Produk →
      </a>
    </div>

    <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
      @forelse($products as $product)
      @php
      $firstImage = $product->images->first();

      $imageUrl = asset('images/no-image.png');

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

      <article class="group overflow-hidden rounded-[1.5rem] bg-white shadow-premium ring-1 ring-slate-100 transition hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up">
        <!-- Product Image -->
        <div class="relative h-64 overflow-hidden bg-slate-100">
          <img src="{{ $imageUrl }}"
            alt="Parcel Lebaran {{ $product->name }} OM JASDUN"
            loading="lazy"
            class="h-full w-full object-cover transition duration-500 group-hover:scale-110">

          <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>

          <span class="absolute left-4 top-4 rounded-full bg-jasdun-gold px-4 py-2 text-[10px] font-black uppercase tracking-widest text-jasdun-green">
            Best Seller
          </span>

          <div class="absolute bottom-4 left-4 right-4">
            <p class="text-xs font-black uppercase tracking-[0.25em] text-jasdun-gold2">
              Premium Series
            </p>
            <h3 class="mt-1 font-display text-2xl font-black text-white">
              {{ $product->name }}
            </h3>
          </div>
        </div>

        <!-- Product Info -->
        <div class="p-6">
          <p class="line-clamp-2 min-h-[3.5rem] text-sm leading-7 text-slate-600">
            {{ $product->description ?? 'Produk hampers premium dengan kemasan elegan untuk momen spesial.' }}
          </p>

          <div class="mt-5 flex items-center justify-between gap-4">
            <div>
              <p class="text-xs font-bold uppercase tracking-widest text-slate-400">
                Harga
              </p>
              <p class="mt-1 text-2xl font-black text-jasdun-green">
                Rp {{ number_format($product->price, 0, ',', '.') }}
              </p>
            </div>

            <div class="rounded-full bg-jasdun-green/10 px-3 py-2 text-xs font-black text-jasdun-green">
              Ready
            </div>
          </div>

          <div class="mt-6 grid gap-3">
            <a href="{{ route('product.detail', $product->id) }}"
              class="rounded-full bg-jasdun-green px-5 py-3 text-center text-sm font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2">
              Lihat Detail
            </a>

            <a href="https://wa.me/6285935359648?text=Halo%20OM%20JASDUN,%20saya%20ingin%20pesan%20{{ urlencode($product->name) }}"
              class="rounded-full border-2 border-jasdun-green px-5 py-3 text-center text-sm font-black uppercase tracking-widest text-jasdun-green transition hover:bg-jasdun-green hover:text-white">
              Pesan WhatsApp
            </a>
          </div>
        </div>
      </article>
      @empty
      <div class="col-span-full rounded-[1.5rem] border border-dashed border-slate-300 bg-slate-50 p-10 text-center">
        <p class="font-display text-2xl font-bold text-jasdun-green">
          Belum ada produk
        </p>
        <p class="mt-2 text-sm text-slate-500">
          Produk akan tampil otomatis setelah data produk dan gambar ditambahkan.
        </p>
      </div>
      @endforelse
    </div>
  </div>
</section>
<!-- Features -->
<section id="about" class="luxury-pattern py-14 text-white" data-aos="fade-up">
  <div class="mx-auto grid max-w-7xl gap-8 px-5 text-center sm:grid-cols-2 lg:grid-cols-4 lg:px-8">
    <div class="p-4">
      <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full border border-jasdun-gold text-jasdun-gold2">✦</div>
      <h3 class="font-display text-xl font-bold">Bahan Berkualitas</h3>
      <p class="mt-3 text-sm leading-7 text-white/75">Hanya menggunakan bahan premium dan terseleksi untuk kepuasan Anda.</p>
    </div>
    <div class="p-4">
      <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full border border-jasdun-gold text-jasdun-gold2">✓</div>
      <h3 class="font-display text-xl font-bold">Pengiriman Aman</h3>
      <p class="mt-3 text-sm leading-7 text-white/75">Sistem packaging khusus yang menjamin paket sampai dengan utuh dan rapi.</p>
    </div>
    <div class="p-4">
      <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full border border-jasdun-gold text-jasdun-gold2">♛</div>
      <h3 class="font-display text-xl font-bold">Packaging Mewah</h3>
      <p class="mt-3 text-sm leading-7 text-white/75">Desain packaging eksklusif yang menambah nilai prestise pada hadiah Anda.</p>
    </div>
    <div class="p-4">
      <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full border border-jasdun-gold text-jasdun-gold2">Rp</div>
      <h3 class="font-display text-xl font-bold">Harga Kompetitif</h3>
      <p class="mt-3 text-sm leading-7 text-white/75">Berbagai pilihan harga yang dapat disesuaikan dengan budget perusahaan atau personal.</p>
    </div>
  </div>
</section>

<!-- Order Steps -->
<section id="order" class="bg-white py-16" data-aos="fade-up">
  <div class="mx-auto max-w-6xl px-5 text-center lg:px-8">
    <h2 class="font-display text-3xl font-bold text-jasdun-green md:text-4xl">Cara Memesan</h2>
    <p class="mt-3 text-slate-600">Langkah mudah untuk mengirimkan kebahagiaan.</p>

    <div class="mt-12 grid gap-8 md:grid-cols-3">
      <div class="relative rounded-2xl border bg-jasdun-cream p-8">
        <span class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-jasdun-gold text-lg font-black text-jasdun-green">1</span>
        <h3 class="mt-5 font-display text-2xl font-bold text-jasdun-green">Pilih Produk</h3>
        <p class="mt-3 text-sm leading-7 text-slate-600">Pilih koleksi parcel sesuai selera dan budget dari katalog kami.</p>
      </div>
      <div class="relative rounded-2xl border bg-jasdun-cream p-8">
        <span class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-jasdun-gold text-lg font-black text-jasdun-green">2</span>
        <h3 class="mt-5 font-display text-2xl font-bold text-jasdun-green">Lakukan Pembayaran</h3>
        <p class="mt-3 text-sm leading-7 text-slate-600">Konfirmasi detail pesanan dan selesaikan transaksi dengan aman.</p>
      </div>
      <div class="relative rounded-2xl border bg-jasdun-cream p-8">
        <span class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-jasdun-gold text-lg font-black text-jasdun-green">3</span>
        <h3 class="mt-5 font-display text-2xl font-bold text-jasdun-green">Pesanan Dikirim</h3>
        <p class="mt-3 text-sm leading-7 text-slate-600">Kami akan antar parcel Anda tepat waktu sampai ke tujuan.</p>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Slider: Plugin Swiper.js -->
<section class="bg-slate-50 py-16" data-aos="fade-up">
  <div class="mx-auto max-w-7xl px-5 lg:px-8">
    <h2 class="text-center font-display text-3xl font-bold text-jasdun-green md:text-4xl">Apa Kata Mereka?</h2>

    <div class="testimonial-swiper swiper mt-10">
      <div class="swiper-wrapper">
        <div class="swiper-slide h-auto">
          <figure class="h-full bg-white p-7 shadow-lg">
            <div class="text-3xl text-jasdun-gold">“</div>
            <blockquote class="mt-2 text-sm leading-8 text-slate-600">Parcel yang dikirim sangat mewah. Rekanan bisnis saya sangat terkesan dengan packagingnya yang premium.</blockquote>
            <figcaption class="mt-6">
              <p class="font-bold text-jasdun-green">Anisa Rahmawati</p>
              <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Corporate Client</p>
            </figcaption>
          </figure>
        </div>

        <div class="swiper-slide h-auto">
          <figure class="h-full bg-white p-7 shadow-lg">
            <div class="text-3xl text-jasdun-gold">“</div>
            <blockquote class="mt-2 text-sm leading-8 text-slate-600">Kue keringnya enak banget, bener-bener rasa premium. Box-nya cantik dan cocok untuk oleh-oleh.</blockquote>
            <figcaption class="mt-6">
              <p class="font-bold text-jasdun-green">Budi Santoso</p>
              <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Repeat Customer</p>
            </figcaption>
          </figure>
        </div>

        <div class="swiper-slide h-auto">
          <figure class="h-full bg-white p-7 shadow-lg">
            <div class="text-3xl text-jasdun-gold">“</div>
            <blockquote class="mt-2 text-sm leading-8 text-slate-600">Pengiriman sangat rapi dan tepat waktu. Adminnya responsif membantu custom pesanan kantor kami.</blockquote>
            <figcaption class="mt-6">
              <p class="font-bold text-jasdun-green">Indah Permata</p>
              <p class="text-xs font-bold uppercase tracking-widest text-slate-400">HR Manager</p>
            </figcaption>
          </figure>
        </div>
      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev hidden md:flex"></div>
      <div class="swiper-button-next hidden md:flex"></div>
    </div>
  </div>
</section>
<!-- Location Maps -->
<section id="lokasi" class="bg-white py-16" data-aos="fade-up">
  <div class="mx-auto max-w-7xl px-5 lg:px-8">
    <div class="mb-10 text-center">
      <p class="text-xs font-black uppercase tracking-[0.3em] text-jasdun-gold">
        Lokasi Kami
      </p>
      <h2 class="mt-3 font-display text-3xl font-bold text-jasdun-green md:text-4xl">
        Kunjungi OM JASDUN
      </h2>
      <p class="mx-auto mt-3 max-w-2xl text-slate-600">
        Silakan kunjungi lokasi kami atau hubungi admin untuk pemesanan parcel Lebaran.
      </p>
    </div>

    <div class="grid gap-8 lg:grid-cols-3">
      <div class="rounded-[1.5rem] bg-jasdun-cream p-7 shadow-premium">
        <h3 class="font-display text-2xl font-bold text-jasdun-green">
          Alamat
        </h3>

        <p class="mt-4 text-sm leading-7 text-slate-600">
          Jl. Contoh Alamat OM JASDUN, Kota Anda, Indonesia
        </p>

        <div class="mt-6 space-y-3 text-sm text-slate-700">
          <p>
            <span class="font-bold text-jasdun-green">WhatsApp:</span>
            0859-3535-9648
          </p>
          <p>
            <span class="font-bold text-jasdun-green">Jam Buka:</span>
            08.00 - 20.00 WIB
          </p>
        </div>

        <a href="https://wa.me/6285935359648"
          class="mt-7 inline-flex rounded-full bg-jasdun-green px-6 py-3 text-sm font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2">
          Hubungi Admin
        </a>
      </div>

      <div class="overflow-hidden rounded-[1.5rem] shadow-premium ring-1 ring-slate-100 lg:col-span-2">
        <div id="omjasdun-map"></div>
      </div>
    </div>
  </div>
</section>
<script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@type": "Store",
    "name": "OM JASDUN",
    "description": "Penyedia parcel Lebaran premium dan hampers eksklusif.",
    "url": "{{ route('landing') }}",
    "telephone": "+6285935359648",
    "image": "{{ asset('images/logo-omjasdun1.png') }}",
    "address": {
      "@@type": "PostalAddress",
      "addressCountry": "ID",
      "addressLocality": "Indonesia"
    }
  }
</script>

@endsection