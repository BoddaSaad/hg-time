<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CateogryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'featured' => $this->faker->boolean(),
            'active' => $this->faker->boolean(),
            'parent_id' => null,
        ];
    }
}
