<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'street'     => $this->street,
            'number'     => $this->number,
            'district'   => $this->district,
            'complement' => $this->complement,
            'zip_code'   => $this->zip_code,
            'created_at' => $this->created_at,
        ];
    }
}
