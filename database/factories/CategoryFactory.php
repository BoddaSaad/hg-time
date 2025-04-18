<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'featured' => true,
            'active' => true,
            'landing' => $this->faker->boolean(),
            'parent_id' => null,
        ];
    }
}
