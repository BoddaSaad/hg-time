<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function __invoke()
    {
        $featuredCategories = Category::where('featured', true)->with('media')->get();
        $newArrivals = Product::select(["id", "title", "description", "price", "discount", "discount_type", "quantity", "brand_id"])
            ->with(['media', 'brand'])->latest()->take(12)->get();

        return view(
                'welcome',
                compact('featuredCategories', 'newArrivals')
            );
    }
}
