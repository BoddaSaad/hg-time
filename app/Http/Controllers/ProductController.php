<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {

    }

    public function show(Product $product)
    {
        $product = $product->load(['categories', 'media', 'brand.media']);

//        return $product;

        return view('products.show', compact('product'));
    }
}
