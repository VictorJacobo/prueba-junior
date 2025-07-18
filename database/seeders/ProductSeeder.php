<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        $products = [
            [
                'name' => 'Smartphone X',
                'description' => 'Último modelo con cámara de 48MP',
                'price' => 599.99,
                'quantity' => 50,
                'category_id' => $categories->where('name', 'Electrónicos')->first()->id,
            ],
            [
                'name' => 'Zapatillas Running',
                'description' => 'Zapatillas cómodas para correr',
                'price' => 89.99,
                'quantity' => 100,
                'category_id' => $categories->where('name', 'Deportes')->first()->id,
            ],
            // Agrega más productos según necesites
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        // Productos adicionales con factory
        Product::factory(20)->create([
            'category_id' => $categories->random()->id,
        ]);
    }
}
