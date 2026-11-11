@extends('layouts.app')

@section('title', 'Livraison — ShopAfrica')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <nav class="text-sm text-gray-500 mb-6"><a href="{{ route('home') }}" class="hover:text-primary-500">Accueil</a><span class="mx-2">/</span><span>Livraison</span></nav>
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Livraison</h1>
    <p class="text-gray-500 mb-10">Toutes les informations sur nos zones de livraison, délais et tarifs.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">&#128230; Produits physiques</h2>
            <div class="space-y-4">
                <div class="border-b border-gray-100 pb-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Côte d'Ivoire</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between"><span class="text-gray-600">Abidjan (express)</span><span class="font-medium">24-48h — 1 500 XOF</span></div>
                        <div class="flex justify-between"><span class="text-gray-600">Abidjan (standard)</span><span class="font-medium">3-5j — Gratuit*</span></div>
                        <div class="flex justify-between"><span class="text-gray-600">Autres villes CI</span><span class="font-medium">3-7j — 2 500 XOF</span></div>
                    </div>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Afrique de l'Ouest</h3>
                    <div class="flex justify-between text-sm"><span class="text-gray-600">Sénégal, Mali, Burkina</span><span class="font-medium">5-10j — 5 000 XOF</span></div>
                </div>
                <p class="text-xs text-gray-400">* Livraison standard gratuite pour toute commande &ge; 30 000 XOF à Abidjan</p>
            </div>
        </div>
        <div class="bg-blue-50 rounded-2xl border border-blue-100 p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">&#128231; Produits numériques</h2>
            <div class="bg-white rounded-lg p-4 mb-3"><div class="font-semibold text-gray-900 mb-1">Livraison instantanée</div><p class="text-sm text-gray-700">Immédiatement après paiement par email.</p></div>
            <div class="bg-white rounded-lg p-4"><div class="font-semibold text-gray-900 mb-1">Gratuit partout</div><p class="text-sm text-gray-700">Téléchargement dans le monde entier.</p></div>
        </div>
    </div>
    <div class="bg-yellow-50 rounded-xl p-5 text-sm text-yellow-800">
        <strong>Important :</strong> Les délais sont indicatifs. Contact : contact@shopafrica.ci
    </div>
</div>
@endsection
