@extends('layouts.app')

@section('title', 'Politique de confidentialité — ShopAfrica')
@section('meta_description', 'Politique de confidentialité de ShopAfrica. Comment nous collectons, utilisons et protégeons vos données personnelles.')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-primary-500">Accueil</a>
        <span class="mx-2">/</span>
        <span class="text-gray-700">Politique de confidentialité</span>
    </nav>

    <h1 class="text-3xl font-bold text-gray-900 mb-2">Politique de confidentialité</h1>
    <p class="text-gray-500 mb-8">Dernière mise à jour : 1er janvier 2024</p>

    <div class="prose max-w-none text-gray-700 space-y-6">
        <div class="bg-blue-50 rounded-xl p-4 text-sm text-blue-800">
            Chez ShopAfrica, nous prenons la protection de vos données personnelles très au sérieux. Cette politique explique comment nous collectons, utilisons et protégeons vos informations.
        </div>

        <h2 class="text-xl font-bold text-gray-900 mt-6">1. Responsable du traitement des données</h2>
        <p>ShopAfrica SARL, dont le siège est situé à Plateau, Abidjan, Côte d'Ivoire, est responsable du traitement de vos données personnelles. Contact : contact@shopafrica.ci</p>

        <h2 class="text-xl font-bold text-gray-900 mt-6">2. Données collectées</h2>
        <p>Nous collectons les données suivantes lorsque vous utilisez notre site :</p>
        <ul class="list-disc pl-6 space-y-1">
            <li><strong>Données d'identification :</strong> nom, prénom, adresse email, numéro de téléphone</li>
            <li><strong>Données de livraison :</strong> adresse postale, ville, pays</li>
            <li><strong>Données de transaction :</strong> historique des commandes, montants</li>
            <li><strong>Données de navigation :</strong> adresse IP, pages visitées, durée de visite, type de navigateur</li>
            <li><strong>Cookies :</strong> préférences, panier d'achat, sessions</li>
        </ul>

        <h2 class="text-xl font-bold text-gray-900 mt-6">3. Vos droits</h2>
        <p>Vous disposez des droits suivants : accès, rectification, effacement, opposition, portabilité. Contact : <a href="mailto:contact@shopafrica.ci" class="text-primary-500">contact@shopafrica.ci</a></p>

        <h2 class="text-xl font-bold text-gray-900 mt-6">4. Sécurité des données</h2>
        <p>Notre site utilise le protocole HTTPS (SSL/TLS) pour toutes les communications. Vos données de paiement ne sont jamais stockées sur nos serveurs.</p>
    </div>
</div>
@endsection
