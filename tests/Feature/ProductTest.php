<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_products_table_has_expected_columns(): void
    {
        $this->assertTrue(Schema::hasColumns('products', [
            'id',
            'name',
            'price'
        ]));
    }

    /** @test */
    public function a_product_has_a_name(): void
    {
        /* Arrange */
        $product = Product::factory()->create([
            'name' => 'Sample Product'
        ]);

        /* Act */
        $name = $product->name;

        /* Assert */
        $this->assertEquals('Sample Product', $name);
    }

    /** @test */
    public function a_product_has_a_price(): void
    {
        /* Arrange */
        $product = Product::factory()->create([
            'price' => 5000,
        ]);

        /* Act */
        $price = $product->price;

        /* Assert */
        $this->assertEquals(5000, $price);
    }

    /** @test */
    public function a_product_has_a_formatted_price(): void
    {
        /* Arrange */
        $product = Product::factory()->create([
            'price' => 5000,
        ]);

        /* Act */
        $formatted_price = $product->formatted_price;

        /* Assert */
        $this->assertEquals(50.00, $formatted_price);
    }
}
