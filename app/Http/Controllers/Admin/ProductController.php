<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id')->get();

        return view('admin.products', compact('products'));
    }

    public function create()
    {
        return view('admin.create-product');
    }

    public function store(Request $request)
    {
        $validated = $this->validateProduct($request);

        $images = $this->uploadImages($request);

        Product::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']) . '-' . Str::random(8),
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category' => $validated['category'],
            'sizes' => $this->parseSizes($validated['sizes'] ?? ''),
            'colors' => array_keys($images),
            'images' => $images,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.edit-product', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $this->validateProduct($request);

        $images = $this->uploadImages(
            $request,
            $product->images ?? []
        );

        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category' => $validated['category'],
            'sizes' => $this->parseSizes($validated['sizes'] ?? ''),
            'colors' => array_keys($images),
            'images' => $images,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
{
    $product->delete();

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Product deleted successfully!');
}
    private function validateProduct(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'price' => 'required|numeric|min:0|max:999999',
            'category' => 'required|in:clothing,accessories,gaming',
            'sizes' => 'nullable|string|max:255',
            'images' => 'nullable|array:Black,White,Blue,Purple',
            'images.*' => 'array|max:4',
            'images.*.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'remove_colors' => 'nullable|array',
            'remove_colors.*' => 'in:Black,White,Blue,Purple',
        ]);
    }

    private function uploadImages(Request $request, array $images = [])
    {
        $colors = ['Black', 'White', 'Blue', 'Purple'];

        $removed = $request->input('remove_colors', []);

        $remaining = array_diff(array_keys($images), $removed);

        $hasUploads = false;

        foreach ($colors as $color) {
            if ($request->hasFile("images.$color")) {
                $hasUploads = true;
            }
        }

        if (empty($remaining) && !$hasUploads) {
            throw ValidationException::withMessages([
                'images' => 'Please keep or upload at least one image.',
            ]);
        }

        foreach ($removed as $color) {
            unset($images[$color]);
        }

        foreach ($colors as $color) {
            if ($request->hasFile("images.$color")) {

                $images[$color] = [];

                foreach ($request->file("images.$color") as $file) {

                    $filename = $file->hashName();

                    $file->move(
                        public_path('assets/images'),
                        $filename
                    );

                    $images[$color][] = $filename;
                }
            }
        }

        return $images;
    }

    private function parseSizes(string $sizes)
    {
        return array_values(array_filter(array_map(
            'trim',
            explode(',', $sizes)
        )));
    }
}