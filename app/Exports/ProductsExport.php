<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Product::with('category')->get();
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Descripción',
            'Categoría',
            'Precio',
            'Stock',
            'Fecha de creación'
        ];
    }

    public function map($product): array
    {
        return [
            $product->name,
            $product->description,
            $product->category->name,
            $product->price,
            $product->quantity,
            $product->created_at->format('d/m/Y H:i'),
        ];
    }
}
