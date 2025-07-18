<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener categorías con conteo de productos y precio promedio
        $categories = Category::withCount('products')
                            ->withAvg('products', 'price')
                            ->get();

        // Preparar datos para los gráficos
        $productsByCategoryData = [
            'labels' => $categories->pluck('name'),
            'values' => $categories->pluck('products_count')
        ];

        $avgPriceByCategoryData = [
            'labels' => $categories->pluck('name'),
            'values' => $categories->pluck('products_avg_price')
        ];

        return view('dashboard', [
            'totalProducts' => Product::count(),
            'totalCategories' => Category::count(),
            'productsByCategoryData' => $productsByCategoryData,
            'avgPriceByCategoryData' => $avgPriceByCategoryData
        ]);
    }
}
