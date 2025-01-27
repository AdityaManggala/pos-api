<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "ShipperId" => $this->ShipperId,
            "ShipperName" => $this->ShipperName,
            "Phone" => $this->Phone
        ];
    }
}
