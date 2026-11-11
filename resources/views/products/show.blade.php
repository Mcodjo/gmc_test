@extends('layouts.app')

@section('title', $product->title . ' — ShopAfrica')
@section('meta_description', Str::limit(strip_tags($product->short_description ?? $product->description), 160))

@section('meta_extra')
<meta property="og:title" content="{{ $product->title }}">
<meta property="og:description" content="{{ Str::limit(strip_tags($product->short_description ?? $product->description), 200) }}">
<meta property="og:type" content="product">
<meta property="og:url" content="{{ url('/produit/' . $product->slug) }}">
<meta property="product:price:amount" content="{{ $product->price }}">
<meta property="product:price:currency" content="{{ $product->currency }}">
@endsection

@section('head_scripts')
@php
$schemaImages = [url($product->image_link)];
if ($product->additional_image_link) { $schemaImages[] = url($product->additional_image_link); }
$schemaJson = [
    '@context' => 'https://schema.org/',
    '@type' => 'Product',
    'name' => $product->title,
    'image' => $schemaImages,
    'description' => Str::limit(strip_tags($product->description), 500),
    'brand' => ['@type' => 'Brand', 'name' => $product->brand ?? 'ShopAfrica'],
    'offers' => [
        '@type' => 'Offer',
        'url' => url('/produit/' . $product->slug),
        'priceCurrency' => $product->currency,
        'price' => (string) $product->price,
        'availability' => $product->schema_availability,
        'itemCondition' => 'https://schema.org/NewCondition',
        'seller' => ['@type' => 'Organization', 'name' => 'ShopAfrica'],
    ],
];
if ($product->gtin) { $schemaJson['gtin13'] = $product->gtin; }
if ($product->mpn) { $schemaJson['mpn'] = $product->mpn; }
@endphp
<script type="application/ld+json">
{!! json_encode($schemaJson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-primary-500">Accueil</a>
        <span class="mx-2">/</span>
        <a href="{{ route('category.show', $product->category->slug) }}" class="hover:text-primary-500">{{ $product->category->name }}</a>
        <span class="mx-2">/</span>
        <span class="text-gray-700">{{ $product->title }}</span>
    </nav>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <div>
            <div class="bg-gray-100 rounded-2xl h-80 flex items-center justify-center mb-4">
                @if(str_contains($product->google_product_category, '543676'))
                <span style="font-size:5rem;">&#8987;</span>
                @elseif($product->google_product_category === '100')
                <span style="font-size:5rem;">&#127890;</span>
                @else
                <span style="font-size:5rem;">&#128214;</span>
                @endif
            </div>
            @if($product->additional_image_link)
            <div class="bg-gray-50 rounded-xl h-24 flex items-center justify-center border-2 border-dashed border-gray-200">
                @if(str_contains($product->google_product_category, '543676'))
                <span style="font-size:3rem;">&#8987;</span>
                @elseif($product->google_product_category === '100')
                <span style="font-size:3rem;">&#127890;</span>
                @else
                <span style="font-size:3rem;">&#128214;</span>
                @endif
                <span class="text-xs text-gray-400 ml-2">Vue alternative</span>
            </div>
            @endif
        </div>
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="text-xs bg-primary-50 text-primary-600 font-semibold px-2 py-1 rounded-full">{{ $product->category->name }}</span>
                @if($product->is_digital)
                <span class="text-xs bg-blue-50 text-blue-600 font-semibold px-2 py-1 rounded-full">Téléchargement numérique</span>
                @endif
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">{{ $product->title }}</h1>
            <div class="flex items-center gap-3 mt-2">
                <div class="flex text-yellow-400">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <span class="text-sm text-gray-500">(24 avis)</span>
            </div>
            <div class="mt-4 pb-4 border-b border-gray-100">
                <div class="flex items-baseline gap-2">
                    <span class="text-3xl font-bold text-primary-500">{{ $product->formatted_price }}</span>
                    <span class="text-sm text-gray-400">TTC</span>
                </div>
                @if(!$product->is_digital)
                <p class="text-sm text-gray-500 mt-1">+ Livraison : {{ $product->shipping_price > 0 ? number_format($product->shipping_price, 0, ',', ' ') . ' ' . $product->currency : 'Gratuite' }}</p>
                @else
                <p class="text-sm text-blue-600 mt-1">Livré par email immédiatement après paiement</p>
                @endif
            </div>
            <div class="mt-4 flex items-center gap-4 text-sm">
                @if($product->availability === 'in_stock')
                <span class="text-green-600 font-medium">&#10003; En stock</span>
                @else
                <span class="text-red-600 font-medium">Rupture de stock</span>
                @endif
                @if($product->brand)
                <span class="text-gray-500">Marque : <strong class="text-gray-700">{{ $product->brand }}</strong></span>
                @endif
                <span class="text-gray-500">État : <strong class="text-gray-700">Neuf</strong></span>
            </div>
            <div class="mt-3 text-xs text-gray-400 space-y-1">
                @if($product->gtin)<p>GTIN : {{ $product->gtin }}</p>@endif
                @if($product->mpn)<p>Référence : {{ $product->mpn }}</p>@endif
            </div>
            @if($product->availability === 'in_stock')
            <form method="POST" action="{{ route('cart.add') }}" class="mt-6">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="flex items-center gap-3">
                    <select name="quantity" class="border border-gray-200 rounded-full px-3 py-2 text-sm bg-transparent focus:outline-none">
                        @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="flex-1 bg-primary-500 hover:bg-primary-600 text-white font-bold py-3 px-6 rounded-full transition-colors text-center">Ajouter au panier</button>
                </div>
            </form>
            <a href="{{ route('checkout.index') }}" class="block mt-3 text-center border-2 border-primary-500 text-primary-500 hover:bg-primary-50 font-semibold py-3 rounded-full transition-colors">Acheter maintenant</a>
            @endif
            <div class="mt-6 grid grid-cols-3 gap-3 text-center text-xs text-gray-500">
                <div class="bg-gray-50 rounded-lg p-2"><div class="text-lg mb-1">&#128274;</div>Paiement sécurisé</div>
                @if(!$product->is_digital)
                <div class="bg-gray-50 rounded-lg p-2"><div class="text-lg mb-1">&#8617;</div>Retour 30j</div>
                <div class="bg-gray-50 rounded-lg p-2"><div class="text-lg mb-1">&#128737;</div>Garantie 1 an</div>
                @else
                <div class="bg-gray-50 rounded-lg p-2"><div class="text-lg mb-1">&#128231;</div>Email immédiat</div>
                <div class="bg-gray-50 rounded-lg p-2"><div class="text-lg mb-1">&#8734;</div>Accès à vie</div>
                @endif
            </div>
        </div>
    </div>
    <div class="mt-10 bg-white rounded-2xl border border-gray-100 p-6 md:p-8">
        <h2 class="text-xl font-bold text-gray-900 mb-4 pb-2 border-b border-gray-100">Description du produit</h2>
        <div class="prose max-w-none text-gray-700 leading-relaxed">{!! nl2br(e($product->description)) !!}</div>
    </div>
</div>
@endsection
