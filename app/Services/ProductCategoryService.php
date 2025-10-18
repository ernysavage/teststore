<?php
namespace App\Services;

use App\Models\Product;
use App\Models\ProductCategory;

class ProductCategoryService
{
    public function getTreePaginated(int $perPage = 6)
    {
        return ProductCategory::with('children.children')
            ->whereNull('parent_id')
            ->paginate($perPage);
    } 
    public function getTreeWithProducts()
    {
        return ProductCategory::with('products', 'children.products', 'children.children')->whereNull('parent_id')->get();
    }

    public function getCategoriesWithProducts($perPage = 6)
    {
        return ProductCategory::with('products')
            ->whereNull('parent_id')
            ->paginate($perPage);
    }

    public function createProductCategory(array $data)
    {
        return ProductCategory::create($data);
    }

    public function updateProductCategory(ProductCategory $category, array $data)
    {
        $category->update($data);
        return $category;
    }

    public function deleteProductCategory(ProductCategory $category)
    {
        return $category->delete();
    }
}