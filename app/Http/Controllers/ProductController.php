<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Services\ProductService;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductController extends Controller
{
    protected ProductService $service;

    use HasFactory;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $products = $this->service->paginateProducts(6);
        return ProductResource::collection($products);
    }

    public function show(string $slug)
    {
        $product = $this->service->getProductBySlug($slug);
        return new ProductResource($product);
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->service->createProduct($request->validated());
        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product = $this->service->updateProduct($product, $request->validated());
        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $this->service->deleteProduct($product);
        return response()->noContent();
    }
}
