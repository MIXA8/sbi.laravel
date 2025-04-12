<?php

namespace App\Services;

use App\Jobs\ExportProductsToExcel;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductService
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    )
    {
    }

    public function getAll()
    {
        return $this->productRepository->all();
    }

    public function findById(int $id)
    {
        return $this->productRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function update(Product $product, array $data)
    {
        return $this->productRepository->update($product, $data);
    }

    public function delete(Product $product): void
    {
        $this->productRepository->delete($product);
    }

    public function exportToExcel(): void
    {
        dispatch(new ExportProductsToExcel('products_export.xlsx'));
    }
}
