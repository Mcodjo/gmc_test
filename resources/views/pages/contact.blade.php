@extends('layouts.app')

@section('title', 'Contact — ShopAfrica')
@section('meta_description', 'Contactez l\'équipe ShopAfrica. Email, téléphone et formulaire de contact.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-primary-500">Accueil</a><span class="mx-2">/</span><span class="text-gray-700">Contact</span>
    </nav>
    <h1 class="text-4xl font-bold text-gray-900 mb-2">Contactez-nous</h1>
    <p class="text-gray-500 mb-10">Notre équipe vous répond sous 24 heures ouvrables.</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="space-y-5">
            <div class="bg-white rounded-xl border border-gray-100 p-5">
                <div class="text-2xl mb-2">&#128231;</div>
                <h3 class="font-semibold text-gray-900">Email</h3>
                <a href="mailto:contact@shopafrica.ci" class="text-primary-500 text-sm">contact@shopafrica.ci</a>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-5">
                <div class="text-2xl mb-2">&#128222;</div>
                <h3 class="font-semibold text-gray-900">Téléphone</h3>
                <a href="tel:+22507000000000" class="text-primary-500 text-sm">+225 07 00 00 00 00</a>
                <p class="text-xs text-gray-400 mt-1">Lun–Ven : 8h–18h</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-5">
                <div class="text-2xl mb-2">&#128205;</div>
                <h3 class="font-semibold text-gray-900">Adresse</h3>
                <p class="text-sm text-gray-600">Plateau, Abidjan<br>Côte d'Ivoire</p>
            </div>
        </div>
        <div class="md:col-span-2 bg-white rounded-2xl border border-gray-100 p-6">
            <h2 class="font-bold text-gray-900 text-xl mb-5">Envoyer un message</h2>
            <form method="POST" action="{{ route('contact.send') }}" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Nom complet *</label>
                    <input type="text" name="name" required class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                    <input type="email" name="email" required class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></div>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Sujet *</label>
                <input type="text" name="subject" required class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Message *</label>
                <textarea name="message" rows="6" required class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 resize-none"></textarea></div>
                <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white font-semibold px-6 py-3 rounded-full transition-colors">Envoyer le message</button>
            </form>
        </div>
    </div>
</div>
@endsection
