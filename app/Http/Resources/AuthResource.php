<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request,): array
    {
        return [
            'user' => [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'roles' => $this->whenLoaded('permissions', function () {
                    return $this->roles->pluck('permission');
                }),
            ],
            'token' => $this->when(isset($this->token), $this->token),
        ];
    }
}
