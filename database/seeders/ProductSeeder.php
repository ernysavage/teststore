<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        
        ProductCategory::all()->each(function ($category) {
            Product::factory()->count(16)->create([
                'category_id' => $category->id
            ]);
        });
    }
}

