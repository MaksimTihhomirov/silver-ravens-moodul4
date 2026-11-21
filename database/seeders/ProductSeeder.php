<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'SILVER RAVENS T-SHIRT',
                'slug' => 'tshirt',
                'description' => 'Premium quality T-shirt featuring the official Silver Ravens logo. Comfortable, stylish and perfect for everyday wear.',
                'price' => 29.99,
                'category' => 'clothing',
                'images' => [
                    'Black' => [
                        'SILVER-RAVENS-TSHIRT-BLACK-FRONT.png',
                        'SILVER-RAVENS-TSHIRT-BLACK-BACK.png',
                    ],
                    'White' => [
                        'SILVER-RAVENS-TSHIRT-WHITE-FRONT.png',
                        'SILVER-RAVENS-TSHIRT-WHITE-BACK.png',
                    ],
                    'Blue' => [
                        'SILVER-RAVENS-TSHIRT-PURPLE-FRONT.png',
                        'SILVER-RAVENS-TSHIRT-PURPLE-BACK.png',
                    ],
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => ['Black', 'White', 'Blue'],
            ],
            [
                'name' => 'SILVER RAVENS HOODIE',
                'slug' => 'hoodie',
                'description' => 'Premium quality hoodie featuring the official Silver Ravens logo. Comfortable, warm and perfect for everyday wear.',
                'price' => 49.99,
                'category' => 'clothing',
                'images' => [
                    'Black' => [
                        'SILVER-RAVENS-HOODIE-FRONT.png',
                        'SILVER-RAVENS-HOODIE-BACK.png',
                    ],
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => ['Black'],
            ],
            [
                'name' => 'SILVER RAVENS CAP',
                'slug' => 'cap',
                'description' => 'Official Silver Ravens cap featuring our signature logo. Lightweight, comfortable and perfect for everyday wear.',
                'price' => 22.99,
                'category' => 'accessories',
                'images' => [
                    'Black' => [
                        'SILVER-RAVENS-CAP.png',
                    ],
                ],
                'sizes' => ['ONE SIZE'],
                'colors' => ['Black'],
            ],
            [
                'name' => 'SILVER RAVENS MUG',
                'slug' => 'mug',
                'description' => 'Official Silver Ravens mug featuring our signature team logo.',
                'price' => 9.99,
                'category' => 'accessories',
                'images' => [
                    'Black' => [
                        'SILVER-RAVENS-MUG.png',
                    ],
                ],
                'sizes' => ['ONE SIZE'],
                'colors' => ['Black'],
            ],
            [
                'name' => 'SILVER RAVENS MOUSEPAD',
                'slug' => 'mousepad',
                'description' => 'Premium Silver Ravens gaming mousepad with a smooth surface for precise mouse control.',
                'price' => 19.99,
                'category' => 'gaming',
                'images' => [
                    'Black' => [
                        'SILVER-RAVENS-MOUSEPAD.png',
                    ],
                ],
                'sizes' => ['STANDARD'],
                'colors' => ['Black'],
            ],
            [
                'name' => 'SILVER RAVENS MOUSE',
                'slug' => 'mouse',
                'description' => 'High-performance Silver Ravens gaming mouse. Designed for precision, speed and comfort.',
                'price' => 39.99,
                'category' => 'gaming',
                'images' => [
                    'White' => [
                        'SILVER-RAVENS-MOUSE.png',
                    ],
                ],
                'sizes' => [],
                'colors' => ['White'],
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}