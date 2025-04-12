<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    public function collection()
    {
        return Product::with('category')->get()->map(function ($product) {
            return [
                'name' => $product->name,
                'barcode' => $product->barcode,
                'price' => $product->price,
                'category' => $product->category->name,
            ];
        });
    }

    public function headings(): array
    {
        return ['Product Name', 'Barcode', 'Price', 'Category'];
    }
}
