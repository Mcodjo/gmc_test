@extends('layouts.app')

@section('title', $category->name . ' — ShopAfrica')
@section('meta_description', 'Découvrez notre sélection ' . $category->name . ' sur ShopAfrica. ' . $category->description)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-primary-500">Accueil</a>
        <span class="mx-2">/</span>
        <a href="{{ route('categories.index') }}" class="hover:text-primary-500">Catégories</a>
        <span class="mx-2">/</span>
        <span class="text-gray-700">{{ $category->name }}</span>
    </nav>

    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ $category->name }}</h1>
            <p class="text-gray-500 mt-1">{{ $products->count() }} produit{{ $products->count() > 1 ? 's' : '' }} disponible{{ $products->count() > 1 ? 's' : '' }}</p>
        </div>
        <div class="flex gap-2">
            <select class="border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option>Trier par : Pertinence</option>
                <option>Prix croissant</option>
                <option>Prix décroissant</option>
                <option>Nouveautés</option>
            </select>
        </div>
    </div>

    @if($products->isEmpty())
        <div class="text-center py-16 text-gray-400">
            <div class="text-5xl mb-4">&#128230;</div>
            <p class="text-lg">Aucun produit dans cette catégorie pour l'instant.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 group">
                <a href="{{ route('product.show', $product->slug) }}" class="block">
                    <div class="h-48 bg-gray-50 flex items-center justify-center text-6xl">
                        @if(str_contains($product->google_product_category, '543676'))
                        <span style="font-size:4rem;">&#8987;</span>
                        @elseif($product->google_product_category === '100')
                        <span style="font-size:4rem;">&#127890;</span>
                        @else
                        <span style="font-size:4rem;">&#128214;</span>
                        @endif
                    </div>
                </a>
                <div class="p-4">
                    <a href="{{ route('product.show', $product->slug) }}">
                        <h2 class="font-semibold text-gray-900 hover:text-primary-500 transition-colors line-clamp-2">{{ $product->title }}</h2>
                    </a>
                    <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $product->short_description }}</p>
                    @if($product->brand)
                    <p class="text-xs text-gray-400 mt-1">par {{ $product->brand }}</p>
                    @endif
                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <span class="text-xl font-bold text-primary-500">{{ $product->formatted_price }}</span>
                            <span class="text-xs text-gray-400 block">TTC</span>
                        </div>
                        <form method="POST" action="{{ route('cart.add') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white text-sm font-semibold px-4 py-2 rounded-full transition-colors">
                                + Panier
                            </button>
                        </form>
                    </div>
                    @if($product->availability === 'in_stock')
                        <span class="inline-block mt-2 text-xs text-green-600 font-medium">&#10003; En stock</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
