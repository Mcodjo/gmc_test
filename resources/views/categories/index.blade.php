@extends('layouts.app')

@section('title', 'Toutes les catégories — ShopAfrica')
@section('meta_description', 'Explorez toutes les catégories de ShopAfrica : Électronique, Sacs & Accessoires, Livres Numériques. Boutique en ligne Côte d\'Ivoire.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-primary-500">Accueil</a>
        <span class="mx-2">/</span>
        <span class="text-gray-700">Catégories</span>
    </nav>

    <h1 class="text-3xl font-bold text-gray-900 mb-2">Toutes nos catégories</h1>
    <p class="text-gray-500 mb-8">Découvrez notre sélection de produits soigneusement organisés par catégorie.</p>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        @foreach($categories as $category)
        <a href="{{ route('category.show', $category->slug) }}" class="group bg-white rounded-2xl border border-gray-100 p-8 hover:shadow-lg hover:border-primary-200 transition-all">
            <div class="text-5xl mb-4">
                @if($category->slug === 'electronique') &#128187;
                @elseif($category->slug === 'sacs-accessoires') &#128084;
                @else &#128218;
                @endif
            </div>
            <h2 class="text-xl font-bold text-gray-900 group-hover:text-primary-500 transition-colors">{{ $category->name }}</h2>
            <p class="text-gray-500 mt-2 text-sm">{{ $category->description }}</p>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-sm text-gray-400">{{ $category->products_count }} produit{{ $category->products_count > 1 ? 's' : '' }}</span>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-block">Voir &rarr;</span>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
