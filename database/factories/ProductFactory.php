<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ProductCategory;

class ProductFactory extends Factory
{
    
    public function definition(): array
    {
        $title = $this->faker->unique()->words(3, true);
        return [
            'title' => ucfirst($title),
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1, 1000),
            'description' => $this->faker->sentence(),
            'category_id' => ProductCategory::inRandomOrder()->first()?->id ?? null,
        ];
    }
}
