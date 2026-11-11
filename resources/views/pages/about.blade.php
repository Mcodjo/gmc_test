@extends('layouts.app')

@section('title', 'À propos de ShopAfrica — Boutique en ligne Côte d\'Ivoire')
@section('meta_description', 'Découvrez ShopAfrica, votre boutique en ligne de confiance en Côte d\'Ivoire.')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-primary-500">Accueil</a><span class="mx-2">/</span><span class="text-gray-700">À propos</span>
    </nav>
    <h1 class="text-4xl font-bold text-gray-900 mb-4">À propos de ShopAfrica</h1>
    <p class="text-xl text-gray-500 mb-10">La boutique en ligne de confiance pour les consommateurs d'Afrique de l'Ouest.</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-orange-50 rounded-2xl p-6 text-center"><div class="text-4xl mb-3">&#127978;</div><h3 class="font-bold text-gray-900">Fondée en 2022</h3><p class="text-sm text-gray-600 mt-1">Abidjan, Côte d'Ivoire</p></div>
        <div class="bg-orange-50 rounded-2xl p-6 text-center"><div class="text-4xl mb-3">&#127758;</div><h3 class="font-bold text-gray-900">7 pays desservis</h3><p class="text-sm text-gray-600 mt-1">Afrique de l'Ouest</p></div>
        <div class="bg-orange-50 rounded-2xl p-6 text-center"><div class="text-4xl mb-3">&#11088;</div><h3 class="font-bold text-gray-900">+500 clients</h3><p class="text-sm text-gray-600 mt-1">Satisfaction garantie</p></div>
    </div>
    <div class="text-gray-700 space-y-6">
        <h2 class="text-2xl font-bold text-gray-900">Notre histoire</h2>
        <p>ShopAfrica a été fondée en 2022 à Abidjan par une équipe de passionnés du e-commerce désireuse de proposer aux consommateurs ivoiriens et ouest-africains une expérience d'achat en ligne fiable, sécurisée et adaptée à leurs besoins.</p>
        <h2 class="text-2xl font-bold text-gray-900">Nos engagements</h2>
        <ul class="space-y-2">
            <li>&#10003; <strong>Authenticité</strong> : tous nos produits sont authentiques et vérifiés</li>
            <li>&#10003; <strong>Sécurité</strong> : paiement sécurisé par SSL</li>
            <li>&#10003; <strong>Rapidité</strong> : livraison en 48h à Abidjan</li>
            <li>&#10003; <strong>Retours faciles</strong> : politique de retour 30 jours</li>
        </ul>
        <h2 class="text-2xl font-bold text-gray-900">Informations légales</h2>
        <p><strong>Raison sociale :</strong> ShopAfrica SARL<br><strong>Siège social :</strong> Plateau, Abidjan, Côte d'Ivoire<br><strong>RCCM :</strong> CI-ABJ-2024-B-00001<br><strong>Email :</strong> contact@shopafrica.ci</p>
    </div>
</div>
@endsection
