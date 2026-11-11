<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <title>@yield('title', 'ShopAfrica — Boutique en ligne Côte d\'Ivoire')</title>
    <meta name="description" content="@yield('meta_description', 'ShopAfrica : votre boutique en ligne de référence en Côte d\'Ivoire. Électronique, mode, livres numériques. Livraison rapide partout en Afrique.')">
    @yield('meta_extra')
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        primary: { DEFAULT: '#FF6B00', 50: '#FFF3E8', 100: '#FFE0C2', 500: '#FF6B00', 600: '#E05F00', 700: '#B34B00' },
                        dark: '#1A1A2E',
                    }
                }
            }
        }
    </script>
    @yield('head_scripts')
</head>
<body class="bg-gray-50 font-sans text-gray-800 antialiased">

{{-- Header --}}
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <span class="text-2xl font-bold text-primary-500">Shop<span class="text-dark">Africa</span></span>
                <span class="hidden sm:block text-xs text-gray-400 font-medium mt-1">Côte d'Ivoire</span>
            </a>

            {{-- Search bar --}}
            <div class="hidden md:flex flex-1 max-w-md mx-6">
                <div class="relative w-full">
                    <input type="text" placeholder="Rechercher un produit…"
                           class="w-full border border-gray-200 rounded-full py-2 pl-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 16.65z"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Nav links --}}
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-primary-500 transition-colors">Accueil</a>
                <a href="{{ route('categories.index') }}" class="hover:text-primary-500 transition-colors">Catégories</a>
                <a href="{{ route('about') }}" class="hover:text-primary-500 transition-colors">À propos</a>
                <a href="{{ route('contact') }}" class="hover:text-primary-500 transition-colors">Contact</a>
            </nav>

            {{-- Cart icon --}}
            <a href="{{ route('cart.index') }}" class="relative ml-4 flex items-center gap-1 bg-primary-500 text-white px-3 py-2 rounded-full text-sm font-semibold hover:bg-primary-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m5-9v9m4-9v9m5-9l2 9"/>
                </svg>
                <span>Panier</span>
                @php $cartCount = count(session('cart', [])) @endphp
                @if($cartCount > 0)
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $cartCount }}</span>
                @endif
            </a>

            {{-- Mobile menu button --}}
            <button class="md:hidden ml-2 p-2 text-gray-600" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 py-3 pb-4">
            <nav class="flex flex-col gap-3 text-sm font-medium text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-primary-500 px-2">Accueil</a>
                <a href="{{ route('categories.index') }}" class="hover:text-primary-500 px-2">Catégories</a>
                <a href="{{ route('about') }}" class="hover:text-primary-500 px-2">À propos</a>
                <a href="{{ route('contact') }}" class="hover:text-primary-500 px-2">Contact</a>
            </nav>
        </div>
    </div>
</header>

{{-- Flash messages --}}
@if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-6 py-3 text-sm">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-6 py-3 text-sm">
        {{ session('error') }}
    </div>
@endif

{{-- Main content --}}
<main>
    @yield('content')
</main>

{{-- Footer --}}
<footer class="bg-dark text-gray-300 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            {{-- Col 1 : Boutique --}}
            <div>
                <h3 class="text-white font-bold text-lg mb-4">ShopAfrica</h3>
                <p class="text-sm text-gray-400 leading-relaxed">Votre boutique en ligne de confiance en Côte d'Ivoire. Électronique, mode et livres numériques.</p>
                <div class="mt-4 text-sm text-gray-400">
                    <p>Abidjan, Côte d'Ivoire</p>
                    <p>+225 07 00 00 00 00</p>
                    <p>contact@shopafrica.ci</p>
                </div>
            </div>

            {{-- Col 2 : Navigation --}}
            <div>
                <h3 class="text-white font-semibold mb-4">Navigation</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Accueil</a></li>
                    <li><a href="{{ route('categories.index') }}" class="hover:text-white transition-colors">Catégories</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">À propos</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                    <li><a href="{{ route('cart.index') }}" class="hover:text-white transition-colors">Mon panier</a></li>
                </ul>
            </div>

            {{-- Col 3 : Informations légales --}}
            <div>
                <h3 class="text-white font-semibold mb-4">Informations légales</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Politique de confidentialité</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-white transition-colors">CGV</a></li>
                    <li><a href="{{ route('returns') }}" class="hover:text-white transition-colors">Politique de retour</a></li>
                    <li><a href="{{ route('shipping') }}" class="hover:text-white transition-colors">Livraison</a></li>
                </ul>
            </div>

            {{-- Col 4 : Paiement sécurisé --}}
            <div>
                <h3 class="text-white font-semibold mb-4">Paiement sécurisé</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-white text-dark text-xs font-bold px-3 py-1 rounded flex items-center gap-1">
                        <span class="text-blue-700">VISA</span>
                    </span>
                    <span class="bg-white text-dark text-xs font-bold px-3 py-1 rounded flex items-center gap-1">
                        <span class="text-red-600">Master</span><span class="text-orange-500">Card</span>
                    </span>
                    <span class="bg-white text-dark text-xs font-bold px-3 py-1 rounded flex items-center gap-1">
                        <span class="text-orange-500">Orange</span>&nbsp;<span class="text-gray-700">Money</span>
                    </span>
                    <span class="bg-white text-dark text-xs font-bold px-3 py-1 rounded flex items-center gap-1">
                        <span class="text-yellow-500">MTN</span>&nbsp;<span class="text-gray-700">MoMo</span>
                    </span>
                </div>
                <p class="text-xs text-gray-500 mt-3">Transactions 100% sécurisées</p>
                <p class="text-xs text-gray-500 mt-1">Paiement en XOF (Franc CFA)</p>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-6 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-500 gap-2">
            <p>&copy; {{ date('Y') }} ShopAfrica. Tous droits réservés. Boutique e-commerce GMC Test.</p>
            <p>RCCM CI-ABJ-2024-B-00001 &middot; Abidjan, Côte d'Ivoire</p>
        </div>
    </div>
</footer>

@yield('scripts')
</body>
</html>
