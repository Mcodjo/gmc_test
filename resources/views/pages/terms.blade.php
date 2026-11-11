@extends('layouts.app')

@section('title', 'Conditions Générales de Vente — ShopAfrica')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <nav class="text-sm text-gray-500 mb-6"><a href="{{ route('home') }}" class="hover:text-primary-500">Accueil</a><span class="mx-2">/</span><span>CGV</span></nav>
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Conditions Générales de Vente (CGV)</h1>
    <p class="text-gray-500 mb-8">En vigueur au 1er janvier 2024</p>
    <div class="text-gray-700 space-y-6">
        <h2 class="text-xl font-bold text-gray-900">1. Identification du vendeur</h2>
        <p><strong>ShopAfrica SARL</strong> &mdash; Plateau, Abidjan, Côte d'Ivoire &mdash; RCCM : CI-ABJ-2024-B-00001</p>
        <h2 class="text-xl font-bold text-gray-900">2. Produits et prix</h2>
        <p>Prix affichés en Franc CFA (XOF), toutes taxes comprises (TTC).</p>
        <h2 class="text-xl font-bold text-gray-900">3. Paiement</h2>
        <p>Visa, Mastercard, Orange Money, MTN Mobile Money. Transactions sécurisées par SSL.</p>
        <h2 class="text-xl font-bold text-gray-900">4. Livraison</h2>
        <p>Abidjan : 24–48h. Autres villes CI : 3–5j. Produits numériques : livraison par email sous 2 minutes.</p>
        <h2 class="text-xl font-bold text-gray-900">5. Droit de rétractation</h2>
        <p>Délai de retour de <strong>30 jours</strong>. Produits numériques non remboursables après téléchargement.</p>
        <h2 class="text-xl font-bold text-gray-900">6. Garantie</h2>
        <p>Tous nos produits physiques bénéficient d'une garantie de <strong>12 mois</strong>.</p>
        <h2 class="text-xl font-bold text-gray-900">7. Droit applicable</h2>
        <p>Droit ivoirien. Juridictions compétentes d'Abidjan, Côte d'Ivoire.</p>
    </div>
</div>
@endsection
