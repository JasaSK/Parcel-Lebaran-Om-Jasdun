@extends('admin-panel.layouts.master')

@section('content')

<!-- Main Edit Product -->
<section>
    <!-- Topbar -->
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-display text-4xl font-black text-jasdun-green">
                Edit Produk
            </h1>
            <p class="mt-2 text-slate-600">
                Perbarui informasi produk, kategori, harga, stok, dan gambar produk.
            </p>
        </div>

        <a href="{{ route('admin.category.index') }}"
            class="bg-slate-100 px-5 py-3 text-xs font-black uppercase tracking-widest text-slate-700 transition hover:bg-jasdun-green hover:text-white">
            ← Kembali
        </a>
    </div>

    <!-- Alert Error -->
    @if ($errors->any())
    <div class="mb-6 border border-red-200 bg-red-50 p-5 text-sm text-red-700">
        <p class="font-black">Terjadi kesalahan:</p>
        <ul class="mt-2 list-disc space-y-1 pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white shadow-sm ring-1 ring-slate-100">
        <div class="border-b border-slate-100 p-6">
            <h2 class="font-display text-2xl font-black text-jasdun-green">
                Form Edit Produk
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Ubah data produk sesuai kebutuhan.
            </p>
        </div>

        <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid gap-6 lg:grid-cols-2">
                <!-- Nama Produk -->
                <div>
                    <label class="mb-2 block text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Nama Produk
                    </label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}"
                        placeholder="Contoh: Hampers Al-Mubarak"
                        class="w-full border border-slate-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-jasdun-green">
                </div>

            </div>

            <!-- Action Button -->
            <div class="mt-8 flex flex-col gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                <a href="{{ route('admin.category.index') }}"
                    class="bg-slate-100 px-6 py-3 text-center text-xs font-black uppercase tracking-widest text-slate-700 transition hover:bg-slate-200">
                    Batal
                </a>

                <button type="submit"
                    class="bg-jasdun-green px-6 py-3 text-xs font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2">
                    Update Produk
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    const imageInput = document.getElementById('images');
    const previewContainer = document.getElementById('previewContainer');

    imageInput.addEventListener('change', function() {
        previewContainer.innerHTML = '';

        Array.from(this.files).forEach((file) => {
            const reader = new FileReader();

            reader.onload = function(event) {
                const wrapper = document.createElement('div');
                wrapper.className = 'overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-100';

                wrapper.innerHTML = `
                    <img src="${event.target.result}" class="h-36 w-full object-cover">
                    <div class="p-3">
                        <p class="truncate text-xs font-bold text-slate-600">${file.name}</p>
                    </div>
                `;

                previewContainer.appendChild(wrapper);
            };

            reader.readAsDataURL(file);
        });
    });
</script>

@endsection