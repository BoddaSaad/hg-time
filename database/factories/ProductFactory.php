<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $price= $this->faker->randomNumber(3, true);
        $discountType = $this->faker->randomElement(['percentage', 'fixed']);
        if($discountType === 'percentage') {
            $discount = $this->faker->numberBetween(0, 100);
        } else {
            $discount = $this->faker->numberBetween(0, $price);
        }

        $date = $this->faker->dateTimeBetween('-1 year');

        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(6),
            'price' => $price,
            'discount' => $discount,
            'discount_type' => $discountType,
            'quantity' => $this->faker->randomNumber(),
            'active' => true,
            'return_policy' => $this->faker->paragraph(),
            'created_at' => $date,
            'updated_at' => $date,

            'brand_id' => Brand::factory(),
        ];
    }
}
