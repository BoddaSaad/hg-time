<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $categories = Category::factory()->count(10)->create();
        $categories->each(function (Category $category) {
            $category->children()->saveMany(Category::factory()->count(rand(1, 5))->create([
                'parent_id' => $category->id,
                'featured' => false,
                'landing' => false
            ]));

            $categoryImages = [
                "https://hardwaremarket.net/wp-content/uploads/2022/02/keyboard.png",
                "https://hardwaremarket.net/wp-content/uploads/2022/02/mouse.png",
                "https://hardwaremarket.net/wp-content/uploads/2023/07/gaming-accs.png",
                "https://hardwaremarket.net/wp-content/uploads/2022/02/mousepad.png",
                "https://hardwaremarket.net/wp-content/uploads/2022/02/headsets.png",
                "https://hardwaremarket.net/wp-content/uploads/2023/06/gamepad.png",
                "https://hardwaremarket.net/wp-content/uploads/2022/02/graphic-tablet.png",
                "https://hardwaremarket.net/wp-content/uploads/2022/02/accessories.png",
                "https://hardwaremarket.net/wp-content/uploads/2023/06/fans-cooling.png",
                "https://hardwaremarket.net/wp-content/uploads/2023/06/streaming.png",
                "https://hardwaremarket.net/wp-content/uploads/2022/02/powersupply.png",
                "https://hardwaremarket.net/wp-content/uploads/2022/02/speakers.png"
            ];

            $category->addMediaFromUrl($categoryImages[array_rand($categoryImages)])
                ->toMediaCollection();
        });

        $brands = Brand::factory()->count(10)->create();
        $brands->each(function (Brand $brand) {
            $brandImages = [
                "https://hardwaremarket.net/wp-content/uploads/2022/08/cq5dam.thumbnail.319.319-135x135.png",
                "https://hardwaremarket.net/wp-content/uploads/2022/12/Shure-logo-985x985-1-135x135.jpg",
                "https://hardwaremarket.net/wp-content/uploads/2022/08/2560px-Toshiba_logo.svg-135x135.png",
                "https://hardwaremarket.net/wp-content/uploads/2022/08/logo0508en-1-135x135.png",
                "https://hardwaremarket.net/wp-content/uploads/2022/08/Kingston-Logo-135x135.png",
                "https://hardwaremarket.net/wp-content/uploads/2022/08/Black-Samsung-Logo-768x255-1-135x135.png"
            ];

            $brand->addMediaFromUrl($brandImages[array_rand($brandImages)])
                ->toMediaCollection();
        });

        $products = Product::factory()->count(100)->create([
            'brand_id' => Brand::inRandomOrder()->value('id'),
        ]);

        $products->each(function (Product $product) {
           $product->categories()->attach(Category::inRandomOrder(3)->value('id'));

           $productImages = [
               "https://hardwaremarket.net/wp-content/uploads/2021/04/Logitech-G-PRO-X-Wireless-Headset-5.jpg.webp",
               "https://hardwaremarket.net/wp-content/uploads/2021/04/Logitech-G-PRO-X-Wireless-Headset-3.jpg.webp",
               "https://hardwaremarket.net/wp-content/uploads/2021/04/Logitech-G-PRO-X-Wireless-Headset-8.jpg.webp",
               "https://hardwaremarket.net/wp-content/uploads/2021/04/Logitech-G-PRO-X-Wireless-Headset-9.jpg.webp",
               "https://hardwaremarket.net/wp-content/uploads/2024/11/photo-output-1.webp",
               "https://hardwaremarket.net/wp-content/uploads/2024/11/photo-output-3.webp",
               "https://hardwaremarket.net/wp-content/uploads/2024/11/hoco-w109-rich-gaming-headphones-convenient.webp",
               "https://hardwaremarket.net/wp-content/uploads/2024/11/61XdcRuCVnL._AC_SL1031_.webp",
               "https://hardwaremarket.net/wp-content/uploads/2023/08/61lpMl921eL._AC_SL1500_.webp",
               "https://hardwaremarket.net/wp-content/uploads/2023/08/71dras5A6SL._AC_SL1500_.webp",
               "https://hardwaremarket.net/wp-content/uploads/2023/08/71pEG7F9ylL._AC_SL1500_.webp",
               "https://hardwaremarket.net/wp-content/uploads/2023/08/619gkaU-NcL._AC_SL1000_.webp"
           ];

          for($i=0; $i<rand(1, 7); $i++){
               $product->addMediaFromUrl($productImages[array_rand($productImages)])
                   ->toMediaCollection();
          }
        });
    }
}
