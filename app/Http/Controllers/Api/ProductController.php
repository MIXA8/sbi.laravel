<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    )
    {
    }

    public function index()
    {
        return ProductResource::collection($this->productService->getAll());
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->create($request->validated());
        return new ProductResource($product->load('category'));
    }

    public function show($id)
    {
        $product = $this->productService->findById($id);
        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $updated = $this->productService->update($product, $request->validated());
        return new ProductResource($updated->load('category'));
    }

    public function destroy(Product $product)
    {
        $this->productService->delete($product);
        return response()->json(['message' => 'Deleted']);
    }

    public function export()
    {
        $this->productService->exportToExcel();
        return response()->json(['message' => 'Export started. Check storage/app/public/products_export.xlsx']);
    }
}
