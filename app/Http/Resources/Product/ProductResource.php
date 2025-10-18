<?php
namespace App\Http\Resources\Product;

use App\Http\Resources\BaseResource;

class ProductResource extends BaseResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'category' => $this->category?->title,
        ];
    }
}
