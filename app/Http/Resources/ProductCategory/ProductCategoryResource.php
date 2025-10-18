<?php
namespace App\Http\Resources\ProductCategory;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Product\ProductResource;

class ProductCategoryResource extends BaseResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'parent_id' => $this->parent_id,
            'products' => ProductResource::collection($this->whenLoaded('products')),
            'childs' => $this->whenLoaded('children', function() {
                return ProductCategoryResource::collection($this->children)->collection->isNotEmpty()
                    ? ProductCategoryResource::collection($this->children)
                    : null;
            }),
        ];
    }
}
