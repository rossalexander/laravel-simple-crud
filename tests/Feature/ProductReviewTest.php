<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ProductReviewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function product_review_table_has_expected_columns(): void
    {
        $this->assertTrue(Schema::hasColumns('product_reviews', [
            'id',
            'user_id',
            'review'
        ]));
    }

    /** @test */
    public function a_product_review_belongs_to_a_user(): void
    {
        /* Arrange */
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $review = ProductReview::factory()->create([
            'product_id' => $product->id,
            'user_id' => $user->id
        ]);

        /* Act */
        $review_owner = $review->user;

        /* Assert */
        $this->assertEquals(1, $review_owner->id);
    }

    /** @test */
    public function auth_users_can_see_product_review_form_on_product_show_view(): void
    {
        /* Arrange */
        $user = User::factory()->create();
        $this->be($user);
        $product = Product::factory()->create();

        /* Act */
        $response = $this->get(route('product.show', [$product]));
        $response->assertSuccessful();

        /* Assert */
        $response->assertSee('Leave a review');
    }

    /** @test */
    public function guest_can_not_see_product_review_form_on_product_show_view(): void
    {
        /* Arrange */
        $product = Product::factory()->create();

        /* Act */
        $response = $this->get(route('product.show', [$product]));
        $response->assertSuccessful();

        /* Assert */
        $response->assertDontSee('Leave a review');
    }

    /** @test */
    public function auth_users_can_post_review_from_product_show_view(): void
    {
        /* Arrange */
        $user = User::factory()->create();
        $this->be($user);
        $product = Product::factory()->create();

        /* Act */
        $response = $this->post(route('product.review.store', $product, ['user' => $user, 'review' => 'test review here']));
        $response->assertSuccessful();

        /* Assert */
    }
}
