<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the user's first name.
     *
     * @return Attribute
     */
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn() => number_format($this->price / 100, 2),
        );
    }

    /**
     * The reviews of this product
     *
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }
}
