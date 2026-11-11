@extends('layouts.app')

@section('title', 'Politique de confidentialité — ShopAfrica')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <nav class="text-sm text-gray-500 mb-6"><a href="{{ route('home') }}" class="hover:text-primary-500">Accueil</a><span class="mx-2">/</span><span>Politique de confidentialité</span></nav>
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Politique de confidentialité</h1>
    <p class="text-gray-500 mb-8">Dernière mise à jour : 1er janvier 2024</p>
    <div class="text-gray-700 space-y-6">
        <div class="bg-blue-50 rounded-xl p-4 text-sm text-blue-800">Chez ShopAfrica, nous prenons la protection de vos données personnelles très au sérieux.</div>
        <h2 class="text-xl font-bold text-gray-900">1. Responsable du traitement</h2>
        <p>ShopAfrica SARL, Plateau, Abidjan, Côte d'Ivoire. Contact : contact@shopafrica.ci</p>
        <h2 class="text-xl font-bold text-gray-900">2. Données collectées</h2>
        <p>Nom, prénom, email, téléphone, adresse de livraison, historique de commandes, données de navigation et cookies.</p>
        <h2 class="text-xl font-bold text-gray-900">3. Vos droits</h2>
        <p>Accès, rectification, effacement, opposition, portabilité. Contact : <a href="mailto:contact@shopafrica.ci" class="text-primary-500">contact@shopafrica.ci</a></p>
        <h2 class="text-xl font-bold text-gray-900">4. Sécurité</h2>
        <p>Notre site utilise HTTPS (SSL/TLS). Vos données de paiement ne sont jamais stockées sur nos serveurs.</p>
    </div>
</div>
@endsection
