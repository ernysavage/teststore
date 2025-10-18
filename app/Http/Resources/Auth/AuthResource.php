<?php
namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'access_token' => $this['access_token'],
            'token_type' => 'bearer',
            'user' => $this['user'], 
        ];
    }
}

