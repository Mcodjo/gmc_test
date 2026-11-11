<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Électronique',
                'slug' => 'electronique',
                'description' => 'Montres connectées, gadgets et accessoires high-tech.',
                'image' => '/images/categories/electronique.jpg',
            ],
            [
                'name' => 'Sacs & Accessoires',
                'slug' => 'sacs-accessoires',
                'description' => 'Sacs à dos, bagages et accessoires de mode.',
                'image' => '/images/categories/sacs.jpg',
            ],
            [
                'name' => 'Livres Numériques',
                'slug' => 'livres-numeriques',
                'description' => 'E-books, guides et formations numériques.',
                'image' => '/images/categories/livres.jpg',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
