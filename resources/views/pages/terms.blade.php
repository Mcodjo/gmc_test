@extends('layouts.app')

@section('title', 'Conditions Générales de Vente — ShopAfrica')
@section('meta_description', 'Conditions générales de vente de ShopAfrica. Livraison, retours, garanties et conditions d\'achat en ligne.')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-primary-500">Accueil</a>
        <span class="mx-2">/</span>
        <span class="text-gray-700">CGV</span>
    </nav>

    <h1 class="text-3xl font-bold text-gray-900 mb-2">Conditions Générales de Vente (CGV)</h1>
    <p class="text-gray-500 mb-8">En vigueur au 1er janvier 2024</p>

    <div class="prose max-w-none text-gray-700 space-y-6">
        <h2 class="text-xl font-bold text-gray-900 mt-6">1. Identification du vendeur</h2>
        <p><strong>ShopAfrica SARL</strong><br>Plateau, Abidjan, Côte d'Ivoire<br>RCCM : CI-ABJ-2024-B-00001<br>Email : contact@shopafrica.ci<br>Téléphone : +225 07 00 00 00 00</p>

        <h2 class="text-xl font-bold text-gray-900 mt-6">2. Produits et prix</h2>
        <p>Les prix sont affichés en Franc CFA (XOF), toutes taxes comprises (TTC).</p>

        <h2 class="text-xl font-bold text-gray-900 mt-6">3. Paiement</h2>
        <p>Moyens acceptés : Visa, Mastercard, Orange Money, MTN Mobile Money. Transactions sécurisées par SSL.</p>

        <h2 class="text-xl font-bold text-gray-900 mt-6">4. Livraison</h2>
        <p>Abidjan : 24–48h. Autres villes CI : 3–5j. Produits numériques : livraison par email sous 2 minutes.</p>

        <h2 class="text-xl font-bold text-gray-900 mt-6">5. Droit de rétractation</h2>
        <p>Délai de retour de <strong>30 jours</strong> à compter de la réception. Produits numériques non remboursables après téléchargement.</p>

        <h2 class="text-xl font-bold text-gray-900 mt-6">6. Garantie</h2>
        <p>Tous nos produits physiques bénéficient d'une garantie de <strong>12 mois</strong> à compter de la date d'achat.</p>

        <h2 class="text-xl font-bold text-gray-900 mt-6">7. Droit applicable</h2>
        <p>Les présentes CGV sont soumises au droit ivoirien. Juridictions compétentes d'Abidjan, Côte d'Ivoire.</p>
    </div>
</div>
@endsection
