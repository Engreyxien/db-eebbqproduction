<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StocksTransferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "reference_number" => $this->reference_number,
            "transfer_from" => $this->transfer_from,
            "transfer_to" => $this->transfer_to,
            "requested_by" => $this->requested_by,
            "date_requested" => $this->date_requested,
            "date_needed" => $this->date_needed,
            "number_of_items" => $this->number_of_items,
            "quantity_unit" => $this->quantity_unit,
            "description" => $this->description,
            "unit_price" => $this->unit_price,
            "amount" => $this->amount,
            "user" => $this->user
        ];
    }
}
