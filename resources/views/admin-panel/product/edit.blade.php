@extends('admin-panel.layouts.master')
@section('title', 'Product Admin - OM JASDUN')
@section('content')

<section>
    <!-- Topbar -->
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-display text-4xl font-black text-jasdun-green">
                Edit Produk
            </h1>
            <p class="mt-2 text-slate-600">
                Edit informasi produk hampers termasuk kategori, harga, deskripsi, dan gambar produk.
            </p>
        </div>

        <a href="{{ route('admin.product.index') }}"
            class="inline-flex items-center gap-2 bg-slate-100 px-5 py-3 text-xs font-black uppercase tracking-widest text-slate-700 transition hover:bg-jasdun-green hover:text-white">
            ← Kembali ke Produk
        </a>
    </div>

    <!-- Alert Error -->
    @if ($errors->any())
    <div class="mb-6 border-l-4 border-red-500 bg-red-50 p-5 text-sm text-red-700">
        <p class="mb-2 font-black">Terjadi kesalahan saat mengisi form:</p>
        <ul class="list-disc space-y-1 pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form Card -->
    <div class="rounded-2xl bg-white shadow-lg ring-1 ring-slate-100">
        <div class="border-b border-slate-100 px-8 py-6">
            <h2 class="font-display text-2xl font-black text-jasdun-green">
                Form Edit Produk
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Ubah data produk sesuai kebutuhan.
            </p>
        </div>

        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')

            <div class="grid gap-6 lg:grid-cols-2">
                <!-- Nama Produk -->
                <div class="lg:col-span-2">
                    <label class="mb-2 block text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Nama Produk <span class="text-red-500">*</span>
                    </label>

                    <input type="text" name="name" value="{{ old('name', $product->name) }}"
                        placeholder="Contoh: Hampers Al-Mubarak"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">
                </div>

                <!-- Kategori -->
                <div>
                    <label class="mb-2 block text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Kategori <span class="text-red-500">*</span>
                    </label>

                    <select name="category_id"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">
                        <option value="">Pilih Kategori</option>

                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Badge -->
                <div>
                    <label class="mb-2 flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Badge
                        <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] text-slate-500">Opsional</span>
                    </label>

                    <input type="text" name="badge" value="{{ old('badge', $product->badge) }}"
                        placeholder="Contoh: Best Seller"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">
                </div>

                <!-- Type -->
                <div>
                    <label class="mb-2 flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Type
                        <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] text-slate-500">Opsional</span>
                    </label>

                    <input type="text" name="type" value="{{ old('type', $product->type) }}"
                        placeholder="Contoh: Premium Series"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">
                </div>

                <!-- Harga -->
                <div>
                    <label class="mb-2 block text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Harga Produk <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-bold text-slate-400">Rp</span>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}"
                            placeholder="1250000"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 pl-10 text-sm outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="lg:col-span-2">
                    <label class="mb-2 block text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Deskripsi Produk
                    </label>

                    <textarea name="description" rows="6"
                        placeholder="Tuliskan deskripsi produk secara lengkap dan menarik..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm leading-7 outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Gambar Lama -->
                <div class="lg:col-span-2">
                    <label class="mb-2 block text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Gambar Saat Ini
                    </label>

                    @if ($product->images && $product->images->count() > 0)
                    <div id="existingImagesContainer" class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($product->images as $image)
                        @php
                        $imagePath = $image->image_path;
                        $imageUrl = str_starts_with($imagePath, 'http://') || str_starts_with($imagePath, 'https://')
                        ? $imagePath
                        : asset('storage/' . $imagePath);
                        @endphp

                        <div class="existing-image group relative overflow-hidden rounded-2xl bg-white shadow-md ring-1 ring-slate-100"
                            data-image-id="{{ $image->id }}">

                            <img src="{{ $imageUrl }}"
                                alt="{{ $product->name }}"
                                class="h-48 w-full object-cover">

                            <button type="button"
                                onclick="toggleDeleteImage('{{ $image->id }}')"
                                class="absolute right-3 top-3 grid h-9 w-9 place-items-center rounded-full bg-red-600 text-white shadow-lg transition hover:bg-red-700">
                                ×
                            </button>

                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3">
                                <p class="text-xs font-semibold text-white">
                                    Klik × untuk tandai hapus
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center">
                        <p class="text-sm font-semibold text-slate-500">
                            Produk ini belum memiliki gambar.
                        </p>
                    </div>
                    @endif

                    <div id="deleteImageInputs"></div>
                </div>

                <!-- Tambah Gambar Baru -->
                <div class="lg:col-span-2">
                    <label class="mb-2 block text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Tambah Gambar Baru
                    </label>

                    <label for="images"
                        id="uploadArea"
                        class="group flex min-h-[180px] cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-8 text-center transition hover:border-jasdun-green hover:bg-jasdun-cream/40">

                        <div class="grid h-16 w-16 place-items-center rounded-full bg-white text-3xl shadow-sm transition group-hover:scale-110">
                            📷
                        </div>

                        <h3 class="mt-4 font-display text-xl font-black text-jasdun-green">
                            Pilih Gambar Produk
                        </h3>

                        <p class="mt-2 max-w-md text-sm leading-6 text-slate-500">
                            Klik area ini untuk memilih gambar. Bisa memilih lebih dari satu gambar.
                        </p>

                        <p class="mt-3 text-xs font-bold uppercase tracking-widest text-slate-400">
                            JPG, JPEG, PNG, WEBP • Maks 2MB per gambar
                        </p>

                        <input type="file"
                            name="images[]"
                            id="images"
                            multiple
                            accept="image/*"
                            class="hidden">
                    </label>

                    <div class="mt-4 flex items-center justify-between rounded-xl bg-white px-4 py-3 ring-1 ring-slate-100">
                        <p id="fileCount" class="text-sm font-semibold text-slate-600">
                            Belum ada gambar baru dipilih
                        </p>

                        <button type="button" id="clearImages"
                            class="hidden text-xs font-black uppercase tracking-widest text-red-600 hover:text-red-700">
                            Hapus Semua
                        </button>
                    </div>

                    <div id="previewContainer" class="mt-5 grid gap-4 sm:grid-cols-2 md:grid-cols-4"></div>
                </div>

                <!-- Action Button -->
                <div class="lg:col-span-2 mt-6 flex flex-col gap-3 border-t border-slate-100 pt-8 sm:flex-row sm:justify-end">
                    <a href="{{ route('admin.product.index') }}"
                        class="rounded-xl bg-slate-100 px-6 py-3 text-center text-xs font-black uppercase tracking-widest text-slate-700 transition hover:bg-slate-200">
                        Batal
                    </a>

                    <button type="submit"
                        class="rounded-xl bg-jasdun-green px-6 py-3 text-xs font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2 hover:shadow-lg">
                        Update Produk
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    const imageInput = document.getElementById('images');
    const previewContainer = document.getElementById('previewContainer');
    const fileCount = document.getElementById('fileCount');
    const clearImages = document.getElementById('clearImages');
    const uploadArea = document.getElementById('uploadArea');
    const deleteImageInputs = document.getElementById('deleteImageInputs');

    let selectedFiles = new DataTransfer();
    let deletedImageIds = [];

    function updateInputFiles() {
        imageInput.files = selectedFiles.files;
    }

    function updateFileCount() {
        const total = selectedFiles.files.length;

        if (total > 0) {
            fileCount.textContent = `${total} gambar baru dipilih`;
            clearImages.classList.remove('hidden');
        } else {
            fileCount.textContent = 'Belum ada gambar baru dipilih';
            clearImages.classList.add('hidden');
        }
    }

    function renderPreview() {
        previewContainer.innerHTML = '';

        Array.from(selectedFiles.files).forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function(event) {
                const wrapper = document.createElement('div');
                wrapper.className = 'overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-100';

                wrapper.innerHTML = `
                    <div class="relative">
                        <img src="${event.target.result}" class="h-40 w-full object-cover">

                        <button type="button"
                            data-index="${index}"
                            class="removeImage absolute right-3 top-3 grid h-8 w-8 place-items-center rounded-full bg-red-600 text-sm font-black text-white transition hover:bg-red-700">
                            ×
                        </button>
                    </div>

                    <div class="p-3">
                        <p class="truncate text-xs font-bold text-slate-700">${file.name}</p>
                        <p class="mt-1 text-xs text-slate-400">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                    </div>
                `;

                previewContainer.appendChild(wrapper);
            };

            reader.readAsDataURL(file);
        });

        updateFileCount();
    }

    function addFiles(files) {
        Array.from(files).forEach((file) => {
            const validType = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'].includes(file.type);
            const validSize = file.size <= 2 * 1024 * 1024;

            if (!validType) {
                alert(`File ${file.name} bukan format gambar yang didukung.`);
                return;
            }

            if (!validSize) {
                alert(`File ${file.name} lebih dari 2MB.`);
                return;
            }

            selectedFiles.items.add(file);
        });

        updateInputFiles();
        renderPreview();
    }

    imageInput.addEventListener('change', function() {
        addFiles(this.files);
    });

    previewContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('removeImage')) {
            const removeIndex = parseInt(e.target.dataset.index);
            const newFiles = new DataTransfer();

            Array.from(selectedFiles.files).forEach((file, index) => {
                if (index !== removeIndex) {
                    newFiles.items.add(file);
                }
            });

            selectedFiles = newFiles;
            updateInputFiles();
            renderPreview();
        }
    });

    clearImages.addEventListener('click', function() {
        selectedFiles = new DataTransfer();
        updateInputFiles();
        renderPreview();
    });

    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('border-jasdun-green', 'bg-jasdun-cream/40');
    });

    uploadArea.addEventListener('dragleave', function() {
        uploadArea.classList.remove('border-jasdun-green', 'bg-jasdun-cream/40');
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('border-jasdun-green', 'bg-jasdun-cream/40');
        addFiles(e.dataTransfer.files);
    });

    function renderDeleteInputs() {
        deleteImageInputs.innerHTML = '';

        deletedImageIds.forEach((id) => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'delete_images[]';
            input.value = id;
            deleteImageInputs.appendChild(input);
        });
    }

    window.toggleDeleteImage = function(imageId) {
        imageId = String(imageId);

        const container = document.querySelector(`[data-image-id="${imageId}"]`);
        const exists = deletedImageIds.includes(imageId);

        if (exists) {
            deletedImageIds = deletedImageIds.filter(id => id !== imageId);

            container.classList.remove('opacity-50', 'ring-2', 'ring-red-400');

            const overlay = container.querySelector('[data-delete-overlay="true"]');
            if (overlay) {
                overlay.remove();
            }
        } else {
            deletedImageIds.push(imageId);

            container.classList.add('opacity-50', 'ring-2', 'ring-red-400');

            const overlay = document.createElement('div');
            overlay.setAttribute('data-delete-overlay', 'true');
            overlay.className = 'absolute inset-0 grid place-items-center bg-red-600/40';

            overlay.innerHTML = `
                <span class="rounded-full bg-white px-4 py-2 text-xs font-black uppercase tracking-widest text-red-600">
                    Akan Dihapus
                </span>
            `;

            container.appendChild(overlay);
        }

        renderDeleteInputs();
    };
</script>

@endsection