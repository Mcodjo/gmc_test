@extends('layouts.app')

@section('title', 'ShopAfrica — Boutique en ligne Côte d\'Ivoire | Électronique, Mode & Livres')
@section('meta_description', 'ShopAfrica, votre boutique en ligne en Côte d\'Ivoire. Achetez montres connectées, sacs et e-books à prix compétitifs. Livraison rapide en Afrique de l\'Ouest.')

@section('content')

{{-- Hero Banner --}}
<section class="bg-gradient-to-br from-dark to-gray-800 text-white py-16 px-4">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-8">
        <div class="flex-1">
            <span class="inline-block bg-primary-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-4">Nouveautés 2024</span>
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">
                La boutique en ligne<br>
                <span class="text-primary-500">#1 en Côte d'Ivoire</span>
            </h1>
            <p class="text-gray-300 text-lg mb-6 max-w-md">Électronique, mode et livres numériques. Paiement sécurisé, livraison rapide partout en Afrique de l'Ouest.</p>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('categories.index') }}" class="bg-primary-500 hover:bg-primary-600 text-white font-semibold px-6 py-3 rounded-full transition-colors">
                    Découvrir les produits
                </a>
                <a href="{{ route('about') }}" class="bg-white/10 hover:bg-white/20 text-white font-semibold px-6 py-3 rounded-full transition-colors">
                    En savoir plus
                </a>
            </div>
            <div class="flex gap-6 mt-8 text-sm text-gray-400">
                <span>&#10003; Paiement sécurisé</span>
                <span>&#10003; Livraison rapide</span>
                <span>&#10003; Retour 30 jours</span>
            </div>
        </div>
        <div class="hidden md:block flex-1 text-center">
            <div class="bg-white/5 rounded-2xl p-8 border border-white/10">
                <div class="text-6xl mb-4">&#128722;</div>
                <div class="grid grid-cols-2 gap-4 text-center">
                    <div class="bg-white/10 rounded-xl p-3">
                        <div class="text-2xl font-bold text-primary-500">500+</div>
                        <div class="text-xs text-gray-400">Clients satisfaits</div>
                    </div>
                    <div class="bg-white/10 rounded-xl p-3">
                        <div class="text-2xl font-bold text-primary-500">3+</div>
                        <div class="text-xs text-gray-400">Catégories</div>
                    </div>
                    <div class="bg-white/10 rounded-xl p-3">
                        <div class="text-2xl font-bold text-primary-500">48h</div>
                        <div class="text-xs text-gray-400">Livraison express</div>
                    </div>
                    <div class="bg-white/10 rounded-xl p-3">
                        <div class="text-2xl font-bold text-primary-500">&#128274;</div>
                        <div class="text-xs text-gray-400">100% sécurisé</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Categories section --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Nos catégories</h2>
        <a href="{{ route('categories.index') }}" class="text-primary-500 hover:text-primary-600 text-sm font-semibold">Voir tout &rarr;</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        @foreach($categories as $category)
        <a href="{{ route('category.show', $category->slug) }}" class="group bg-white rounded-xl border border-gray-100 p-6 hover:shadow-md hover:border-primary-200 transition-all">
            <div class="text-3xl mb-3">
                @if($category->slug === 'electronique') &#128187;
                @elseif($category->slug === 'sacs-accessoires') &#128084;
                @else &#128218;
                @endif
            </div>
            <h3 class="font-semibold text-gray-900 group-hover:text-primary-500 transition-colors">{{ $category->name }}</h3>
            <p class="text-sm text-gray-500 mt-1">{{ $category->products_count }} produit{{ $category->products_count > 1 ? 's' : '' }}</p>
        </a>
        @endforeach
    </div>
</section>

{{-- Featured products --}}
<section class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Produits vedettes</h2>
            <a href="{{ route('categories.index') }}" class="text-primary-500 hover:text-primary-600 text-sm font-semibold">Voir tout &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredProducts as $product)
            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 group">
                <a href="{{ route('product.show', $product->slug) }}" class="block overflow-hidden">
                    <div class="h-48 bg-gray-50 flex items-center justify-center overflow-hidden">
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
                        <h3 class="font-semibold text-gray-900 hover:text-primary-500 transition-colors line-clamp-2">{{ $product->title }}</h3>
                    </a>
                    <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $product->short_description }}</p>
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
    </div>
</section>

{{-- Trust badges --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="text-center p-4">
            <div class="text-3xl mb-2">&#128666;</div>
            <h4 class="font-semibold text-gray-900">Livraison rapide</h4>
            <p class="text-sm text-gray-500">48h à Abidjan, 5j partout en CI</p>
        </div>
        <div class="text-center p-4">
            <div class="text-3xl mb-2">&#128274;</div>
            <h4 class="font-semibold text-gray-900">Paiement sécurisé</h4>
            <p class="text-sm text-gray-500">SSL + Visa, Mastercard, Mobile Money</p>
        </div>
        <div class="text-center p-4">
            <div class="text-3xl mb-2">&#8617;</div>
            <h4 class="font-semibold text-gray-900">Retour 30 jours</h4>
            <p class="text-sm text-gray-500">Satisfait ou remboursé, sans question</p>
        </div>
        <div class="text-center p-4">
            <div class="text-3xl mb-2">&#128172;</div>
            <h4 class="font-semibold text-gray-900">Support client</h4>
            <p class="text-sm text-gray-500">Lun–Ven 8h–18h, réponse &lt;2h</p>
        </div>
    </div>
</section>

@endsection
