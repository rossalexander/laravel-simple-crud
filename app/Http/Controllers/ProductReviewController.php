<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function store(Product $product, Request $request)
    {
        $request->validate([
            'review' => ['required']
        ]);

        $product->reviews()->create([
            'user_id' => $request->user()->id,
            'review' => $request->input('review')
        ]);

        return back();
    }
}
