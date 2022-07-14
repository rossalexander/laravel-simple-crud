<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->words(rand(1, 3), true);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'price' => $this->faker->numberBetween(1000, 5000),
        ];
    }
}
