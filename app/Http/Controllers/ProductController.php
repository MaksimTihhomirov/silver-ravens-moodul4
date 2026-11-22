<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::orderBy('id')->get();

        return view('home', compact('products'));
    }

    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->sort === 'low') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'high') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('id');
        }

        $products = $query->get();

        return view('shop', compact('products'));
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product', compact('product'));
    }
}