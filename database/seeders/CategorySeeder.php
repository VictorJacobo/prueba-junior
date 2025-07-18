<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Electrónicos', 'description' => 'Dispositivos electrónicos y gadgets'],
            ['name' => 'Ropa', 'description' => 'Ropa para hombres, mujeres y niños'],
            ['name' => 'Hogar', 'description' => 'Artículos para el hogar'],
            ['name' => 'Deportes', 'description' => 'Equipamiento deportivo'],
            ['name' => 'Juguetes', 'description' => 'Juguetes para todas las edades'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Categorías adicionales con factory si es necesario
        Category::factory(5)->create();
    }
}
