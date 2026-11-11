@extends('layouts.app')

@section('title', 'Mon Panier — ShopAfrica')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Mon Panier</h1>
    @if(empty($items))
        <div class="bg-white rounded-2xl border border-gray-100 p-12 text-center">
            <div class="text-6xl mb-4">&#128722;</div>
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Votre panier est vide</h2>
            <p class="text-gray-500 mb-6">Découvrez nos produits et ajoutez-les à votre panier.</p>
            <a href="{{ route('categories.index') }}" class="bg-primary-500 hover:bg-primary-600 text-white font-semibold px-6 py-3 rounded-full transition-colors">Continuer mes achats</a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-4">
                @foreach($items as $item)
                <div class="bg-white rounded-xl border border-gray-100 p-4 flex items-center gap-4">
                    <div class="h-20 w-20 bg-gray-50 rounded-lg flex items-center justify-center flex-shrink-0">
                        @if(str_contains($item['product']->google_product_category, '543676'))
                        <span style="font-size:2rem;">&#8987;</span>
                        @elseif($item['product']->google_product_category === '100')
                        <span style="font-size:2rem;">&#127890;</span>
                        @else
                        <span style="font-size:2rem;">&#128214;</span>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <a href="{{ route('product.show', $item['product']->slug) }}" class="font-semibold text-gray-900 hover:text-primary-500 line-clamp-1">{{ $item['product']->title }}</a>
                        <p class="text-sm text-gray-500 mt-1">{{ $item['product']->brand }}</p>
                        <div class="flex items-center gap-4 mt-2">
                            <span class="text-sm text-gray-600">Qté : {{ $item['quantity'] }}</span>
                            <span class="font-bold text-primary-500">{{ number_format($item['subtotal'], 0, ',', ' ') }} {{ $item['product']->currency }}</span>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('cart.remove') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                        <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors p-2" title="Retirer">&#128465;</button>
                    </form>
                </div>
                @endforeach
                <div class="flex justify-between items-center pt-2">
                    <form method="POST" action="{{ route('cart.clear') }}">
                        @csrf
                        <button type="submit" class="text-sm text-gray-500 hover:text-red-500">Vider le panier</button>
                    </form>
                    <a href="{{ route('categories.index') }}" class="text-sm text-primary-500 hover:text-primary-600">&larr; Continuer mes achats</a>
                </div>
            </div>
            <div>
                <div class="bg-white rounded-2xl border border-gray-100 p-6 sticky top-24">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Récapitulatif</h2>
                    <div class="space-y-3 text-sm text-gray-600">
                        @foreach($items as $item)
                        <div class="flex justify-between">
                            <span class="line-clamp-1">{{ $item['product']->title }} &times; {{ $item['quantity'] }}</span>
                            <span class="font-medium">{{ number_format($item['subtotal'], 0, ',', ' ') }} XOF</span>
                        </div>
                        @endforeach
                        <div class="border-t border-gray-100 pt-3 flex justify-between font-bold text-gray-900 text-base">
                            <span>Total TTC</span>
                            <span class="text-primary-500">{{ number_format($total, 0, ',', ' ') }} XOF</span>
                        </div>
                    </div>
                    <a href="{{ route('checkout.index') }}" class="block mt-5 bg-primary-500 hover:bg-primary-600 text-white text-center font-bold py-3 rounded-full transition-colors">Commander &rarr;</a>
                    <p class="text-xs text-gray-400 text-center mt-3">&#128274; Paiement 100% sécurisé</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
