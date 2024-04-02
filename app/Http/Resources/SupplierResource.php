<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Supplier;

class SupplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "SupplierId" => $this->SupplierId,
            "SupplierName" => $this->SupplierName,
            "ContactName" => $this->ContactName,
            "AddressName" => $this->AddressName,
            "City" => $this->City,
            "PostalCode" => $this->PostalCode,
            "Country" => $this->Country,
            "Phone" => $this->Phone
        ];
    }
}
