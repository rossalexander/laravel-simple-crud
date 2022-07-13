<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_products_index_lists_products(): void
    {
        /* Arrange */
        Product::factory(5)->create();
        $product = Product::first();

        /* Act */
        $response = $this->get(route('products.index'));

        /* Assert */
        $response->assertSuccessful();
        $response->assertSee($product->name);
    }
}
