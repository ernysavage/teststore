<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ProductCategory;


class ProductCategoryFactory extends Factory
{
    
    public function definition(): array
    {
        $title = $this->faker->unique()->words(2, true); 
        return [
            'title' => ucfirst($title),
            'slug' => Str::slug($title),
            'parent_id' => null, 
        ];
        
    }
}
