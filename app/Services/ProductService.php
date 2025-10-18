<?php
namespace App\Services;

use App\Models\Product;
use App\Models\ProductCategory;

class ProductService
{
    public function paginateProducts($perPage = 6)
    {
        return Product::paginate($perPage);
    }

    public function getProductBySlug(string $slug)
    {
        return Product::where('slug', $slug)->firstOrFail();
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function updateProduct(Product $product, array $data)
    {
        $product->update($data);
        return $product;
    }

    public function deleteProduct(Product $product)
    {
        return $product->delete();
    }

}