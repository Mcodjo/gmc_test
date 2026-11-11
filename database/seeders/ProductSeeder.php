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
        $catSacs    = Category::where('slug', 'sacs-accessoires')->first()->id;
        $catLivres  = Category::where('slug', 'livres-numeriques')->first()->id;

        $products = [
            [
                'category_id' => $catElectro,
                'title' => 'TimePro X1 — Montre Connectée',
                'slug' => 'timepro-x1-montre-connectee',
                'short_description' => 'Montre connectée TimePro X1 avec suivi fitness, notifications et autonomie 7 jours.',
                'description' => 'La TimePro X1 est la montre connectée idéale pour les sportifs et les professionnels en déplacement. Écran AMOLED 1,4 pouces, suivi cardiaque en temps réel, GPS intégré, compatible Android et iOS, autonomie 7 jours, résistance IP67.',
                'link' => '/produit/timepro-x1-montre-connectee',
                'image_link' => '/images/products/timepro-x1-noir.jpg',
                'additional_image_link' => '/images/products/timepro-x1-argent.jpg',
                'price' => 49900, 'currency' => 'XOF', 'availability' => 'in_stock',
                'brand' => 'TimePro', 'gtin' => '3760000000012', 'mpn' => null, 'condition' => 'new',
                'google_product_category' => '543676',
                'product_type' => 'Electronique > Wearables > Montres Connectées',
                'shipping_country' => 'CI', 'shipping_service' => 'Standard', 'shipping_price' => 2500,
                'identifier_exists' => 'yes', 'is_digital' => false, 'stock' => 50,
            ],
            [
                'category_id' => $catSacs,
                'title' => 'CarryMax Pro — Sac à Dos Professionnel',
                'slug' => 'carrymax-pro-sac-a-dos',
                'short_description' => 'Sac à dos professionnel 30L avec compartiment laptop 15,6", port USB et matière imperméable.',
                'description' => 'Le CarryMax Pro est le sac à dos parfait pour les professionnels nomades. Capacité 30L, compartiment laptop jusquà 15,6 pouces, port USB intégré, nylon 1680D imperméable. Dimensions : 48x32x18cm, poids 850g.',
                'link' => '/produit/carrymax-pro-sac-a-dos',
                'image_link' => '/images/products/carrymax-pro-noir.jpg',
                'additional_image_link' => '/images/products/carrymax-pro-lateral.jpg',
                'price' => 35000, 'currency' => 'XOF', 'availability' => 'in_stock',
                'brand' => 'CarryMax', 'gtin' => null, 'mpn' => 'CMP-30L-BLK-2024', 'condition' => 'new',
                'google_product_category' => '100',
                'product_type' => 'Sacs & Accessoires > Sacs à Dos',
                'shipping_country' => 'CI', 'shipping_service' => 'Standard', 'shipping_price' => 1500,
                'identifier_exists' => 'no', 'is_digital' => false, 'stock' => 120,
            ],
            [
                'category_id' => $catLivres,
                'title' => 'Guide du Dev Backend — E-Book Complet',
                'slug' => 'guide-dev-backend-ebook',
                'short_description' => 'Guide complet pour maîter le développement backend : PHP, Laravel, API REST et bases de données. Format PDF + ePub.',
                'description' => 'Guide du Dev Backend : 320 pages couvrant PHP 8.x, Laravel 11, API REST, MySQL, tests, déploiement Linux et sécurité OWASP. Formats : PDF + ePub. Accès immédiat après achat, livraison par email sous 2 minutes.',
                'link' => '/produit/guide-dev-backend-ebook',
                'image_link' => '/images/products/guide-dev-backend-cover.jpg',
                'additional_image_link' => '/images/products/guide-dev-backend-pages.jpg',
                'price' => 4900, 'currency' => 'XOF', 'availability' => 'in_stock',
                'brand' => 'DevAfrica Studio', 'gtin' => null, 'mpn' => 'GDB-2024-PDF', 'condition' => 'new',
                'google_product_category' => '784',
                'product_type' => 'Livres Numériques > Informatique & Développement',
                'shipping_country' => null, 'shipping_service' => null, 'shipping_price' => 0,
                'identifier_exists' => 'yes', 'is_digital' => true, 'stock' => 999,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['slug' => $product['slug']], $product);
        }
    }
}
