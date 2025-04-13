<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    public function __invoke()
    {
        $featuredCategories = Category::where('featured', true)->with('media')->get();

        return view(
                'welcome',
                compact('featuredCategories')
            );
    }
}
