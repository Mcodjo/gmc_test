<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $catElectro = Category::where('slug', 'electronique')->first()->id;
        $catSacs = Category::where('slug', 'sacs-accessoires')->first()->id;
        $catLivres = Category::where('slug', 'livres-numeriques')->first()->id;

        $products = [
            [
                'category_id' => $catElectro,
                'title' => 'TimePro X1 — Montre Connectée',
                'slug' => 'timepro-x1-montre-connectee',
                'short_description' => 'Montre connectée TimePro X1 avec suivi fitness, notifications et autonomie 7 jours. Disponible en noir et argent.',
                'description' => "La <strong>TimePro X1</strong> est la montre connectée idéale pour les sportifs et les professionnels en déplacement. Dotée d'un écran AMOLED 1,4 pouces, elle offre un suivi complet de votre activité physique : fréquence cardiaque en temps réel, compteur de pas, suivi du sommeil et GPS intégré.\n\nCompatible Android et iOS, la TimePro X1 affiche vos notifications WhatsApp, SMS et appels. Sa batterie longue durée tient jusqu'à 7 jours en utilisation normale. Résistante à l'eau (IP67), elle vous accompagne partout.\n\n<strong>Caractéristiques techniques :</strong>\n- Écran : AMOLED 1,4'' (320 x 320 px)\n- Capteurs : Cardio, SpO2, Accéléromètre\n- Connectivité : Bluetooth 5.0\n- Autonomie : jusqu'à 7 jours\n- Résistance : IP67\n- Poids : 42g\n- Bracelet interchangeable 20mm\n\nDisponible en deux coloris : <strong>Noir Minuit</strong> et <strong>Argent Polaire</strong>.",
                'link' => '/produit/timepro-x1-montre-connectee',
                'image_link' => '/images/products/timepro-x1-noir.jpg',
                'additional_image_link' => '/images/products/timepro-x1-argent.jpg',
                'price' => 49900,
                'currency' => 'XOF',
                'availability' => 'in_stock',
                'brand' => 'TimePro',
                'gtin' => '3760000000012',
                'mpn' => null,
                'condition' => 'new',
                'google_product_category' => '543676',
                'product_type' => 'Électronique > Wearables > Montres Connectées',
                'shipping_country' => 'CI',
                'shipping_service' => 'Standard',
                'shipping_price' => 2500,
                'identifier_exists' => 'yes',
                'is_digital' => false,
                'stock' => 50,
            ],
            [
                'category_id' => $catSacs,
                'title' => 'CarryMax Pro — Sac à Dos Professionnel',
                'slug' => 'carrymax-pro-sac-a-dos',
                'short_description' => 'Sac à dos professionnel 30L avec compartiment laptop 15,6", port USB et matière imperméable.',
                'description' => "Le <strong>CarryMax Pro</strong> est le sac à dos parfait pour les professionnels nomades et les étudiants exigeants. Sa capacité de 30 litres avec organisation intelligente vous permet d'emporter tout votre matériel : ordinateur portable jusqu'à 15,6 pouces, tablette, chargeurs et affaires personnelles.\n\nFabriqué en nylon 1680D ultra-résistant, il est imperméable et résistant aux déchirures. La ceinture pectorale et les sangles rembourrées garantissent un confort optimal même chargé.\n\n<strong>Caractéristiques :</strong>\n- Capacité : 30 litres\n- Compartiment laptop : 15,6 pouces\n- Port USB externe intégré\n- Matière : Nylon 1680D imperméable\n- Dimensions : 48 x 32 x 18 cm\n- Poids à vide : 850g\n- Poignée de transport renforcée\n- Dos aéré avec mousse mémoire\n\nParfait pour le bureau, les voyages et l'université.",
                'link' => '/produit/carrymax-pro-sac-a-dos',
                'image_link' => '/images/products/carrymax-pro-noir.jpg',
                'additional_image_link' => '/images/products/carrymax-pro-lateral.jpg',
                'price' => 35000,
                'currency' => 'XOF',
                'availability' => 'in_stock',
                'brand' => 'CarryMax',
                'gtin' => null,
                'mpn' => 'CMP-30L-BLK-2024',
                'condition' => 'new',
                'google_product_category' => '100',
                'product_type' => 'Sacs & Accessoires > Sacs à Dos',
                'shipping_country' => 'CI',
                'shipping_service' => 'Standard',
                'shipping_price' => 1500,
                'identifier_exists' => 'no',
                'is_digital' => false,
                'stock' => 120,
            ],
            [
                'category_id' => $catLivres,
                'title' => 'Guide du Dev Backend — E-Book Complet',
                'slug' => 'guide-dev-backend-ebook',
                'short_description' => 'Guide complet pour maîtriser le développement backend : PHP, Laravel, API REST et bases de données. Format PDF + ePub.',
                'description' => "<strong>Guide du Dev Backend</strong> est le livre numérique de référence pour tout développeur souhaitant maîtriser les fondamentaux et les bonnes pratiques du développement backend moderne.\n\nCe guide de 320 pages couvre l'intégralité du parcours : des bases de PHP 8.x aux architectures avancées avec Laravel 11, en passant par la conception d'API REST robustes et la gestion des bases de données relationnelles.\n\n<strong>Au programme :</strong>\n- Fondamentaux PHP 8.x : typage fort, enum, fiber, attributs\n- Laravel 11 : structure, Eloquent ORM, middleware, queues\n- API REST : conception, sécurisation JWT, versioning\n- Bases de données : MySQL optimisé, migrations, indexation\n- Tests : PHPUnit, feature tests, couverture de code\n- Déploiement : serveurs Linux, Docker, CI/CD\n- Sécurité : OWASP, injection SQL, XSS, CSRF\n\n<strong>Formats inclus :</strong> PDF haute résolution + ePub compatible toutes liseuses\n\n<strong>Accès immédiat</strong> après achat — livraison par email sous 2 minutes.",
                'link' => '/produit/guide-dev-backend-ebook',
                'image_link' => '/images/products/guide-dev-backend-cover.jpg',
                'additional_image_link' => '/images/products/guide-dev-backend-pages.jpg',
                'price' => 4900,
                'currency' => 'XOF',
                'availability' => 'in_stock',
                'brand' => 'DevAfrica Studio',
                'gtin' => null,
                'mpn' => 'GDB-2024-PDF',
                'condition' => 'new',
                'google_product_category' => '784',
                'product_type' => 'Livres Numériques > Informatique & Développement',
                'shipping_country' => null,
                'shipping_service' => null,
                'shipping_price' => 0,
                'identifier_exists' => 'yes',
                'is_digital' => true,
                'stock' => 999,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['slug' => $product['slug']], $product);
        }
    }
}
