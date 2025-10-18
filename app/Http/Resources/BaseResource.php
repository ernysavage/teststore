<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'data' => parent::toArray($request),
            'status' => 'success',
        ];
    }

    public static function collectionWithData($resource)
    {
        return [
            'data' => static::collection($resource),
            'status' => 'success',
        ];
    }

    public static function paginateWithData($paginated)
    {
        return [
            'data' => static::collection($paginated->items()),
            'status' => 'success',
            'meta' => [
                'current_page' => $paginated->currentPage(),
                'last_page' => $paginated->lastPage(),
                'per_page' => $paginated->perPage(),
                'total' => $paginated->total(),
            ],
            'links' => [
                'next' => $paginated->nextPageUrl(),
                'prev' => $paginated->previousPageUrl(),
            ],
        ];
    }
}
