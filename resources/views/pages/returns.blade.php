@extends('layouts.app')

@section('title', 'Politique de retour — ShopAfrica')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <nav class="text-sm text-gray-500 mb-6"><a href="{{ route('home') }}" class="hover:text-primary-500">Accueil</a><span class="mx-2">/</span><span>Politique de retour</span></nav>
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Politique de retour et remboursement</h1>
    <p class="text-gray-500 mb-8">Dernière mise à jour : 1er janvier 2024</p>
    <div class="grid grid-cols-3 gap-4 mb-10">
        <div class="bg-green-50 rounded-xl p-4 text-center"><div class="text-3xl mb-2">&#8617;</div><div class="text-2xl font-bold text-green-600">30 jours</div><div class="text-sm text-gray-600">pour retourner</div></div>
        <div class="bg-blue-50 rounded-xl p-4 text-center"><div class="text-3xl mb-2">&#128179;</div><div class="text-2xl font-bold text-blue-600">5–7 jours</div><div class="text-sm text-gray-600">remboursement</div></div>
        <div class="bg-orange-50 rounded-xl p-4 text-center"><div class="text-3xl mb-2">&#128231;</div><div class="text-2xl font-bold text-orange-600">24h</div><div class="text-sm text-gray-600">réponse support</div></div>
    </div>
    <div class="text-gray-700 space-y-6">
        <h2 class="text-xl font-bold text-gray-900">1. Délai de retour</h2>
        <p><strong>30 jours calendaires</strong> à compter de la réception.</p>
        <h2 class="text-xl font-bold text-gray-900">2. Produits non retournables</h2>
        <ul class="list-disc pl-6 space-y-1"><li>Produits numériques une fois téléchargés</li><li>Produits endommagés par mauvaise utilisation</li></ul>
        <h2 class="text-xl font-bold text-gray-900">3. Contact service retours</h2>
        <p>Email : <a href="mailto:retours@shopafrica.ci" class="text-primary-500">retours@shopafrica.ci</a> &mdash; Tél : +225 07 00 00 00 00</p>
    </div>
</div>
@endsection
