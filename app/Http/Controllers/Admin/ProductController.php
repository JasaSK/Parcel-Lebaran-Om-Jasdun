<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ImagePath;
use App\Models\Product;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    private function uploadToCloudinary($image)
    {
        $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

        $upload = $cloudinary->uploadApi()->upload(
            $image->getRealPath(),
            [
                'folder' => 'omjasdun/products',
            ]
        );

        return $upload['secure_url'];
    }
    public function index(Request $request)
    {
        $query = Product::with(['category', 'images'])
            ->withCount('images')
            ->latest();

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->q . '%')
                    ->orWhere('description', 'like', '%' . $request->q . '%')
                    ->orWhere('badge', 'like', '%' . $request->q . '%')
                    ->orWhere('type', 'like', '%' . $request->q . '%');
            });
        }

        $products = $query->paginate(10)->withQueryString();

        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $productsWithoutImages = Product::doesntHave('images')->count();

        return view('admin-panel.product.index', compact(
            'products',
            'totalProducts',
            'totalCategories',
            'productsWithoutImages'
        ));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin-panel.product.create', compact('categories'));
    }

    public function edit($id)
    {
        $product = Product::with(['category', 'images'])->findOrFail($id);

        $categories = Category::latest()->get();
        return view('admin-panel.product.edit', compact('product', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'badge' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'badge' => $request->badge,
            'type' => $request->type,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $url = $this->uploadToCloudinary($image);

                ImagePath::create([
                    'product_id' => $product->id,
                    'image_path' => $url,
                ]);
            }
        }

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $product = Product::with('images')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'badge' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',

            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',

            'delete_images' => 'nullable|array',
            'delete_images.*' => [
                Rule::exists('image_product', 'id')->where(function ($query) use ($product) {
                    return $query->where('product_id', $product->id);
                }),
            ],
        ]);

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'badge' => $request->badge,
            'type' => $request->type,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Hapus gambar lama dari database.
        // Kalau gambar lama masih storage lokal, hapus file lokal juga.
        if ($request->filled('delete_images')) {
            $images = $product->images()
                ->whereIn('id', $request->delete_images)
                ->get();

            foreach ($images as $image) {
                if ($image->image_path && !str_starts_with($image->image_path, 'http')) {
                    Storage::disk('public')->delete($image->image_path);
                }

                $image->delete();
            }
        }

        // Tambah gambar baru ke Cloudinary
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $url = $this->uploadToCloudinary($image);

                $product->images()->create([
                    'image_path' => $url,
                ]);
            }
        }

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $product = Product::with('images')->findOrFail($id);

        foreach ($product->images as $image) {
            if ($image->image_path && !str_starts_with($image->image_path, 'http')) {
                Storage::disk('public')->delete($image->image_path);
            }

            $image->delete();
        }

        $product->delete();

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
