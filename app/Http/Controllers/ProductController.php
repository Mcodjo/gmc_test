<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();

        return view('products.show', compact('product'));
    }

    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->get();
        $categories = Category::all();

        return view('categories.show', compact('category', 'products', 'categories'));
    }

    public function allCategories()
    {
        $categories = Category::withCount('products')->get();

        return view('categories.index', compact('categories'));
    }
}
