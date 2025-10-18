<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategory\StoreProductCategoryRequest;
use App\Http\Requests\ProductCategory\UpdateProductCategoryRequest;
use App\Http\Resources\ProductCategory\ProductCategoryResource;
use App\Services\ProductCategoryService;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    protected ProductCategoryService $service;

    public function __construct(ProductCategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->getTreePaginated();

        return ProductCategoryResource::collectionWithData($categories);
    }

    public function withProducts()
    {
        $categories = $this->service->getTreeWithProducts();
        return ProductCategoryResource::collectionWithData($categories);
    }

    public function store(StoreProductCategoryRequest $request)
    {
        $category = $this->service->createProductCategory($request->validated());
        return new ProductCategoryResource($category);
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $category)
    {
        $category = $this->service->updateProductCategory($category, $request->validated());
        return new ProductCategoryResource($category);
    }

    public function destroy(ProductCategory $category)
    {
        $this->service->deleteProductCategory($category);
        return response()->noContent();
    }
}
