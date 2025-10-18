<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ProductCategory::factory()->count(5)->create();

        foreach ($categories as $category) {
            ProductCategory::factory()->count(8)->create([
                'parent_id' => $category->id
            ]);
        }
    }
}
