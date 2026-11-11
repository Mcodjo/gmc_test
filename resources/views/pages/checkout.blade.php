@extends('layouts.app')

@section('title', 'Commander — ShopAfrica')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Commander</h1>
    <p class="text-gray-500 mb-8">Remplissez vos informations de livraison pour finaliser votre commande.</p>
    <form method="POST" action="{{ route('checkout.process') }}">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h2 class="font-bold text-gray-900 mb-4">1. Informations personnelles</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Prénom *</label>
                        <input type="text" name="first_name" required class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Nom *</label>
                        <input type="text" name="last_name" required class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                        <input type="email" name="email" required class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Téléphone *</label>
                        <input type="tel" name="phone" required placeholder="+225 07 00 00 00 00" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h2 class="font-bold text-gray-900 mb-4">2. Adresse de livraison</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-1">Adresse *</label>
                        <input type="text" name="address" required placeholder="Rue, quartier, commune" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Ville *</label>
                        <input type="text" name="city" required placeholder="Abidjan" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Pays *</label>
                        <select name="country" required class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option value="CI" selected>Côte d'Ivoire</option>
                            <option value="SN">Sénégal</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="ML">Mali</option>
                            <option value="GH">Ghana</option>
                        </select></div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h2 class="font-bold text-gray-900 mb-4">3. Paiement</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-4">
                        <label class="cursor-pointer border-2 border-gray-200 rounded-lg p-3 text-center hover:border-primary-500">
                            <input type="radio" name="payment_method" value="visa" class="sr-only" checked>
                            <div class="font-bold text-blue-700 text-lg">VISA</div></label>
                        <label class="cursor-pointer border-2 border-gray-200 rounded-lg p-3 text-center hover:border-primary-500">
                            <input type="radio" name="payment_method" value="mastercard" class="sr-only">
                            <div class="font-bold text-sm"><span class="text-red-600">Master</span><span class="text-orange-500">Card</span></div></label>
                        <label class="cursor-pointer border-2 border-gray-200 rounded-lg p-3 text-center hover:border-primary-500">
                            <input type="radio" name="payment_method" value="orange_money" class="sr-only">
                            <div class="font-bold text-orange-500 text-sm">Orange Money</div></label>
                        <label class="cursor-pointer border-2 border-gray-200 rounded-lg p-3 text-center hover:border-primary-500">
                            <input type="radio" name="payment_method" value="mtn_momo" class="sr-only">
                            <div class="font-bold text-yellow-500 text-sm">MTN MoMo</div></label>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-500 text-center">&#128274; Formulaire de démonstration. Aucun paiement réel ne sera prélevé.</div>
                </div>
                <button type="submit" class="w-full bg-primary-500 hover:bg-primary-600 text-white font-bold py-4 rounded-full transition-colors text-lg">&#10003; Confirmer la commande</button>
            </div>
            <div>
                <div class="bg-white rounded-2xl border border-gray-100 p-6 sticky top-24">
                    <h2 class="font-bold text-gray-900 mb-4">Votre commande</h2>
                    <div class="space-y-3">
                        @foreach($items as $item)
                        <div class="flex gap-3">
                            <div class="h-12 w-12 bg-gray-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                @if(str_contains($item['product']->google_product_category, '543676'))
                                <span style="font-size:1.5rem;">&#8987;</span>
                                @elseif($item['product']->google_product_category === '100')
                                <span style="font-size:1.5rem;">&#127890;</span>
                                @else
                                <span style="font-size:1.5rem;">&#128214;</span>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 line-clamp-1">{{ $item['product']->title }}</p>
                                <p class="text-xs text-gray-500">&times; {{ $item['quantity'] }}</p>
                            </div>
                            <span class="text-sm font-semibold">{{ number_format($item['subtotal'], 0, ',', ' ') }} XOF</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="border-t border-gray-100 mt-4 pt-4 flex justify-between font-bold text-gray-900">
                        <span>Total TTC</span>
                        <span class="text-primary-500">{{ number_format($total, 0, ',', ' ') }} XOF</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
