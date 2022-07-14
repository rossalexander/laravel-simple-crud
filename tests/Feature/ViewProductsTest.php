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
        $response = $this->get(route('product.index'));

        /* Assert */
        $response->assertSuccessful();
        $response->assertSee($product->name);
    }

    /** @test */
    public function a_single_product_can_be_viewed(): void
    {
        /* Arrange */
        $product = Product::factory()->create([
            'name' => 'Sample Product'
        ]);

        /* Act */
        $response = $this->get(route('product.show', $product));

        /* Assert */
        $response->assertSee('Sample Product');
    }

    /** @test */
    public function products_on_the_products_index_link_to_their_show_view(): void
    {
        /* Arrange */
        Product::factory(5)->create();
        $product = Product::first();

        /* Act */
        $response = $this->get(route('product.index'));

        /* Assert */
        $response->assertSee($product->slug);
    }
}
