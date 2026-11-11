<?php

namespace App\Http\Controllers;

use App\Models\Product;

class FeedController extends Controller
{
    public function googleShopping()
    {
        $products = Product::with('category')->get();

        return response()->view('feed.google-shopping', compact('products'))
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }

    public function sitemap()
    {
        $products = Product::all();
        $categories = \App\Models\Category::all();

        return response()->view('feed.sitemap', compact('products', 'categories'))
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }

    public function robots()
    {
        $content = "User-agent: *\nAllow: /\n\nUser-agent: Googlebot\nAllow: /\n\nUser-agent: Googlebot-Image\nAllow: /\n\nSitemap: " . url('/sitemap.xml') . "\n";

        return response($content)->header('Content-Type', 'text/plain');
    }
}
