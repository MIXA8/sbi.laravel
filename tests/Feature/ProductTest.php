<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{


    use RefreshDatabase;

    public function test_can_create_product(): void
    {
        $category = Category::factory()->create();

        $payload = [
            'name' => 'iPhone 15',
            'price' => 999.99,
            'barcode' => '1234567890123',
            'category_id' => $category->id,
        ];

        $response = $this->postJson('/api/products', $payload);

        $response->assertStatus(201);
        $this->assertDatabaseHas('products', [
            'name' => 'iPhone 15',
            'barcode' => '1234567890123',
            'price' => 999.99,
            'category_id' => $category->id,
        ]);
    }

    public function test_can_update_product_price(): void
    {
        $product = Product::factory()->create([
            'price' => 500,
        ]);

        $response = $this->putJson("/api/products/{$product->id}", [
            'name' => 'Test product',
            'price' => 750,
            'barcode' => $product->barcode,
            'category_id' => $product->category_id,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'price' => 750,
        ]);
    }
}
