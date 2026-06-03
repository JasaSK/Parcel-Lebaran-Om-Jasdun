@extends('admin-panel.layouts.master')

@section('content')

<!-- Main Create Product -->
<section>
    <!-- Topbar -->
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-display text-4xl font-black text-jasdun-green">
                Tambah Produk
            </h1>
            <p class="mt-2 text-slate-600">
                Tambahkan produk hampers baru beserta kategori, harga, stok, dan gambar produk.
            </p>
        </div>

        <a href="{{ route('admin.product.index') }}"
            class="inline-flex items-center gap-2 bg-slate-100 px-5 py-3 text-xs font-black uppercase tracking-widest text-slate-700 transition hover:bg-jasdun-green hover:text-white">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Produk
        </a>
    </div>

    <!-- Alert Error -->
    @if ($errors->any())
    <div class="mb-6 border-l-4 border-red-500 bg-red-50 p-5 text-sm text-red-700">
        <div class="flex items-start gap-3">
            <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
            <div class="flex-1">
                <p class="font-black mb-1">Terjadi kesalahan saat mengisi form:</p>
                <ul class="list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    <!-- Form Card -->
    <div class="rounded-2xl bg-white shadow-lg ring-1 ring-slate-100">
        <div class="border-b border-slate-100 px-8 py-6">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-jasdun-green/10">
                    <svg class="h-5 w-5 text-jasdun-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-display text-2xl font-black text-jasdun-green">
                        Form Data Produk
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Lengkapi informasi produk dengan benar.
                    </p>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf

            <div class="grid gap-6 lg:grid-cols-2">
                <!-- Nama Produk -->
                <div class="lg:col-span-2">
                    <label class="mb-2 flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Nama Produk <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        placeholder="Contoh: Hampers Al-Mubarak"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">
                </div>

                <!-- Kategori -->
                <div>
                    <label class="mb-2 flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select name="category_id"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                    <input type="text" name="badge" value="{{ old('badge') }}"
                        placeholder="Contoh: Best Seller"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">
                </div>

                <!-- Type -->
                <div>
                    <label class="mb-2 flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Type
                        <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] text-slate-500">Opsional</span>
                    </label>
                    <input type="text" name="type" value="{{ old('type') }}"
                        placeholder="Contoh: Premium Series"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">
                </div>

                <!-- Harga -->
                <div>
                    <label class="mb-2 flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Harga Produk <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">Rp</span>
                        <input type="number" name="price" value="{{ old('price') }}"
                            placeholder="1250000"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 pl-8 text-sm outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">
                    </div>
                </div>

                <!-- Stok -->
                <div>
                    <label class="mb-2 flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Stok Produk <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="stock" value="{{ old('stock') }}"
                        placeholder="Contoh: 100"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">
                </div>

                <!-- Deskripsi -->
                <div class="lg:col-span-2">
                    <label class="mb-2 flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Deskripsi Produk <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description" rows="6"
                        placeholder="Tuliskan deskripsi produk secara lengkap dan menarik..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm leading-7 outline-none transition focus:border-jasdun-green focus:bg-white focus:ring-1 focus:ring-jasdun-green">{{ old('description') }}</textarea>
                    <p class="mt-2 text-xs text-slate-400">Maksimal 500 karakter</p>
                </div>

                <!-- Gambar Produk -->
                <div class="lg:col-span-2">
                    <label class="mb-2 flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-slate-500">
                        Gambar Produk <span class="text-red-500">*</span>
                        <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[10px] text-slate-500">Multiple</span>
                    </label>

                    <!-- Tombol Pilih Gambar -->
                    <button type="button" id="selectImagesBtn"
                        class="mb-4 inline-flex items-center gap-2 rounded-xl bg-jasdun-green px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-jasdun-green2 hover:shadow-md">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Gambar
                    </button>

                    <!-- Hidden file input -->
                    <input type="file"
                        name="images[]"
                        id="images"
                        multiple
                        accept="image/*"
                        class="hidden">

                    <!-- Area preview gambar yang sudah dipilih -->
                    <div id="selectedImagesPreview" class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-4"></div>

                    <!-- Informasi file yang sudah dipilih -->
                    <div class="mt-4 flex items-center justify-between rounded-xl bg-slate-50 px-4 py-3">
                        <div class="flex items-center gap-2">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p id="fileCount" class="text-sm font-medium text-slate-600">
                                Belum ada gambar dipilih
                            </p>
                        </div>

                        <button type="button" id="clearImages"
                            class="hidden items-center gap-1 text-xs font-black uppercase tracking-widest text-red-600 transition hover:text-red-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Hapus Semua
                        </button>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="lg:col-span-2 mt-6 flex flex-col gap-3 border-t border-slate-100 pt-8 sm:flex-row sm:justify-end">
                    <a href="{{ route('admin.product.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-100 px-6 py-3 text-center text-xs font-black uppercase tracking-widest text-slate-700 transition hover:bg-slate-200">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                    </a>

                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-jasdun-green px-6 py-3 text-xs font-black uppercase tracking-widest text-white transition hover:bg-jasdun-green2 hover:shadow-lg">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Produk
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    const imageInput = document.getElementById('images');
    const selectedImagesPreview = document.getElementById('selectedImagesPreview');
    const fileCount = document.getElementById('fileCount');
    const clearButton = document.getElementById('clearImages');
    const selectImagesBtn = document.getElementById('selectImagesBtn');

    // Array untuk menyimpan files yang dipilih
    let selectedFiles = [];

    // Update preview dan file count
    function updatePreview() {
        selectedImagesPreview.innerHTML = '';

        if (selectedFiles.length > 0) {
            fileCount.textContent = `${selectedFiles.length} file${selectedFiles.length > 1 ? 's' : ''} dipilih`;
            clearButton.classList.remove('hidden');

            selectedFiles.forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = function(event) {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'group relative overflow-hidden rounded-2xl bg-white shadow-md ring-1 ring-slate-100 transition hover:shadow-lg';
                    wrapper.setAttribute('data-index', index);

                    wrapper.innerHTML = `
                        <div class="relative">
                            <img src="${event.target.result}" class="h-48 w-full object-cover">
                            <button type="button" 
                                onclick="removeImage(${index})"
                                class="absolute right-2 top-2 rounded-full bg-red-500 p-1.5 text-white opacity-0 transition group-hover:opacity-100 hover:bg-red-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 transition group-hover:opacity-100"></div>
                        </div>
                        <div class="p-3">
                            <p class="truncate text-xs font-semibold text-slate-700" title="${file.name}">${file.name}</p>
                            <p class="mt-1 text-xs text-slate-500">${(file.size / 1024).toFixed(1)} KB</p>
                        </div>
                    `;

                    selectedImagesPreview.appendChild(wrapper);
                };

                reader.readAsDataURL(file);
            });
        } else {
            fileCount.textContent = 'Belum ada gambar dipilih';
            clearButton.classList.add('hidden');
            selectedImagesPreview.innerHTML = `
                <div class="col-span-full flex flex-col items-center justify-center rounded-2xl bg-slate-50 py-12">
                    <svg class="h-12 w-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="mt-4 text-sm text-slate-400">Preview gambar akan muncul di sini</p>
                </div>
            `;
        }

        // Update file input dengan files yang tersimpan
        updateFileInput();
    }

    // Update file input element
    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        imageInput.files = dataTransfer.files;
    }

    // Remove image function
    window.removeImage = function(index) {
        selectedFiles.splice(index, 1);
        updatePreview();
    };

    // Clear all images
    clearButton.addEventListener('click', function() {
        selectedFiles = [];
        updatePreview();
    });

    // Handle file selection (menambah file baru tanpa menghapus yang lama)
    function handleFileSelect(newFiles) {
        // Filter file yang valid (max 2MB)
        const validFiles = Array.from(newFiles).filter(file => {
            const isValidSize = file.size <= 2 * 1024 * 1024; // 2MB
            const isValidType = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'].includes(file.type);

            if (!isValidSize) {
                alert(`File ${file.name} melebihi batas 2MB`);
            }
            if (!isValidType) {
                alert(`File ${file.name} bukan format gambar yang didukung (JPG, JPEG, PNG, WEBP)`);
            }

            return isValidSize && isValidType;
        });

        // Tambahkan file baru ke array yang sudah ada
        selectedFiles.push(...validFiles);
        updatePreview();
    }

    // Tombol untuk memilih gambar
    selectImagesBtn.addEventListener('click', function() {
        // Buat input file sementara
        const tempInput = document.createElement('input');
        tempInput.type = 'file';
        tempInput.multiple = true;
        tempInput.accept = 'image/*';

        tempInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                handleFileSelect(e.target.files);
            }
        });

        tempInput.click();
    });

    // Drag and drop functionality
    const uploadArea = selectImagesBtn.parentElement;

    if (uploadArea) {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            selectImagesBtn.classList.add('scale-105', 'shadow-lg');
        }

        function unhighlight(e) {
            selectImagesBtn.classList.remove('scale-105', 'shadow-lg');
        }

        uploadArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            if (files.length > 0) {
                handleFileSelect(files);
            }
        }
    }

    // Optional: Tampilkan pesan sukses saat file ditambahkan
    function showToast(message, type = 'success') {
        // Anda bisa menambahkan toast notification di sini
        console.log(message);
    }
</script>

@endsection