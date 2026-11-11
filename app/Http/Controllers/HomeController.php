<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with('category')->take(3)->get();
        $categories = Category::withCount('products')->get();

        return view('pages.home', compact('featuredProducts', 'categories'));
    }
}
