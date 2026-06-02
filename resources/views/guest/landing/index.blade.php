@extends('layouts.master')

@section('content')
<!-- Hero -->
<section id="home" class="luxury-pattern relative overflow-hidden text-white">
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
<section id="kategori" class="mx-auto max-w-7xl px-5 py-16 lg:px-8">
  <div class="mb-10 text-center">
    <h2 class="font-display text-3xl font-bold text-jasdun-green md:text-4xl">Kategori Pilihan</h2>
  </div>

  <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
    <article class="category-art group flex min-h-44 flex-col justify-end p-6 text-white shadow-premium transition hover:-translate-y-1">
      <h3 class="font-display text-2xl font-bold">Parcel Premium</h3>
      <a href="#produk" class="mt-2 text-xs font-bold uppercase tracking-widest text-jasdun-gold2">Lihat Koleksi →</a>
    </article>
    <article class="category-art group flex min-h-44 flex-col justify-end p-6 text-white shadow-premium transition hover:-translate-y-1">
      <h3 class="font-display text-2xl font-bold">Hampers Kue Kering</h3>
      <a href="#produk" class="mt-2 text-xs font-bold uppercase tracking-widest text-jasdun-gold2">Lihat Koleksi →</a>
    </article>
    <article class="category-art group flex min-h-44 flex-col justify-end p-6 text-white shadow-premium transition hover:-translate-y-1">
      <h3 class="font-display text-2xl font-bold">Paket Sembako</h3>
      <a href="#produk" class="mt-2 text-xs font-bold uppercase tracking-widest text-jasdun-gold2">Lihat Koleksi →</a>
    </article>
    <article class="category-art group flex min-h-44 flex-col justify-end p-6 text-white shadow-premium transition hover:-translate-y-1">
      <h3 class="font-display text-2xl font-bold">Gift Box Custom</h3>
      <a href="#produk" class="mt-2 text-xs font-bold uppercase tracking-widest text-jasdun-gold2">Lihat Koleksi →</a>
    </article>
  </div>
</section>

<!-- Best Seller Products -->
<section id="produk" class="bg-white py-16">
  <div class="mx-auto max-w-7xl px-5 lg:px-8">
    <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <h2 class="font-display text-3xl font-bold text-jasdun-green md:text-4xl">Koleksi Terlaris</h2>
        <p class="mt-3 max-w-2xl text-slate-600">Kurasi parcel terbaik kami yang paling banyak diminati musim ini. Kualitas premium dengan sentuhan personal untuk momen spesial.</p>
      </div>
      <a href="#" class="text-sm font-bold uppercase tracking-widest text-jasdun-gold hover:text-jasdun-green">Semua Produk →</a>
    </div>

    <div class="grid gap-7 md:grid-cols-3">
      <article class="group bg-white shadow-premium ring-1 ring-slate-100">
        <div class="product-art relative h-56 overflow-hidden">
          <span class="absolute left-4 top-4 bg-jasdun-gold px-3 py-1 text-[10px] font-black uppercase tracking-widest text-jasdun-green">Best Seller</span>
          <div class="absolute inset-x-8 bottom-6 rounded-2xl border border-jasdun-gold/30 bg-white/10 p-6 text-center backdrop-blur-sm">
            <div class="text-5xl">🎁</div>
          </div>
        </div>
        <div class="p-6 text-center">
          <p class="text-xs font-bold uppercase tracking-[0.25em] text-jasdun-gold">Premium Series</p>
          <h3 class="mt-2 font-display text-2xl font-bold text-jasdun-green">Hampers Al-Mubarak</h3>
          <p class="mt-2 text-2xl font-black text-jasdun-green">Rp 1.250.000</p>
          <button class="mt-5 w-full border-2 border-jasdun-green px-5 py-2 text-sm font-black uppercase tracking-widest text-jasdun-green transition hover:bg-jasdun-green hover:text-white">Tambah Ke Keranjang</button>
        </div>
      </article>

      <article class="group bg-white shadow-premium ring-1 ring-slate-100">
        <div class="product-art relative h-56 overflow-hidden">
          <div class="absolute inset-x-8 bottom-6 rounded-2xl border border-jasdun-gold/30 bg-white/10 p-6 text-center backdrop-blur-sm">
            <div class="text-5xl">🍪</div>
          </div>
        </div>
        <div class="p-6 text-center">
          <p class="text-xs font-bold uppercase tracking-[0.25em] text-jasdun-gold">Cookie Series</p>
          <h3 class="mt-2 font-display text-2xl font-bold text-jasdun-green">Paket Safiyah</h3>
          <p class="mt-2 text-2xl font-black text-jasdun-green">Rp 750.000</p>
          <button class="mt-5 w-full border-2 border-jasdun-green px-5 py-2 text-sm font-black uppercase tracking-widest text-jasdun-green transition hover:bg-jasdun-green hover:text-white">Tambah Ke Keranjang</button>
        </div>
      </article>

      <article class="group bg-white shadow-premium ring-1 ring-slate-100">
        <div class="product-art relative h-56 overflow-hidden">
          <div class="absolute inset-x-8 bottom-6 rounded-2xl border border-jasdun-gold/30 bg-white/10 p-6 text-center backdrop-blur-sm">
            <div class="text-5xl">🧺</div>
          </div>
        </div>
        <div class="p-6 text-center">
          <p class="text-xs font-bold uppercase tracking-[0.25em] text-jasdun-gold">Grand Series</p>
          <h3 class="mt-2 font-display text-2xl font-bold text-jasdun-green">Grand Raya Parcel</h3>
          <p class="mt-2 text-2xl font-black text-jasdun-green">Rp 2.400.000</p>
          <button class="mt-5 w-full border-2 border-jasdun-green px-5 py-2 text-sm font-black uppercase tracking-widest text-jasdun-green transition hover:bg-jasdun-green hover:text-white">Tambah Ke Keranjang</button>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- Features -->
<section id="about" class="luxury-pattern py-14 text-white">
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
<section id="order" class="bg-white py-16">
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

<!-- Testimonials -->
<section class="bg-slate-50 py-16">
  <div class="mx-auto max-w-7xl px-5 lg:px-8">
    <h2 class="text-center font-display text-3xl font-bold text-jasdun-green md:text-4xl">Apa Kata Mereka?</h2>
    <div class="mt-10 grid gap-7 md:grid-cols-3">
      <figure class="bg-white p-7 shadow-lg">
        <div class="text-3xl text-jasdun-gold">“</div>
        <blockquote class="mt-2 text-sm leading-8 text-slate-600">Parcel yang dikirim sangat mewah. Rekanan bisnis saya sangat terkesan dengan packagingnya yang premium.</blockquote>
        <figcaption class="mt-6">
          <p class="font-bold text-jasdun-green">Anisa Rahmawati</p>
          <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Corporate Client</p>
        </figcaption>
      </figure>
      <figure class="bg-white p-7 shadow-lg">
        <div class="text-3xl text-jasdun-gold">“</div>
        <blockquote class="mt-2 text-sm leading-8 text-slate-600">Kue keringnya enak banget, bener-bener rasa premium. Box-nya cantik dan cocok untuk oleh-oleh.</blockquote>
        <figcaption class="mt-6">
          <p class="font-bold text-jasdun-green">Budi Santoso</p>
          <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Repeat Customer</p>
        </figcaption>
      </figure>
      <figure class="bg-white p-7 shadow-lg">
        <div class="text-3xl text-jasdun-gold">“</div>
        <blockquote class="mt-2 text-sm leading-8 text-slate-600">Pengiriman sangat rapi dan tepat waktu. Adminnya responsif membantu custom pesanan kantor kami.</blockquote>
        <figcaption class="mt-6">
          <p class="font-bold text-jasdun-green">Indah Permata</p>
          <p class="text-xs font-bold uppercase tracking-widest text-slate-400">HR Manager</p>
        </figcaption>
      </figure>
    </div>
  </div>
</section>

<!-- CTA -->
<section id="contact" class="luxury-pattern px-5 py-16 text-center text-white lg:px-8">
  <h2 class="font-display text-3xl font-bold md:text-4xl">Butuh Bantuan Memilih?</h2>
  <p class="mx-auto mt-4 max-w-2xl leading-8 text-white/80">Tim customer service kami siap membantu Anda memilih parcel terbaik atau mendiskusikan kebutuhan pesanan custom dalam jumlah besar.</p>
  <a href="https://wa.me/6281234567890" class="mt-8 inline-flex items-center justify-center gap-2 bg-white px-8 py-3 text-sm font-black uppercase tracking-widest text-jasdun-green transition hover:bg-jasdun-gold2">Konsultasi Via WhatsApp</a>
</section>

@endsection