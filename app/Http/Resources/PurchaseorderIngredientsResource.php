<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseOrderIngredientsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            "id" => $this->id,
            "company_name" => $this->company_name,
            "date_requested" => $this->date_requested,
            "date_needed" => $this->date_needed,
            "number_of_items" => $this->number_of_items,
            "quantity_unit" => $this->quantity_unit,
            "particulars" => $this->particulars,
            "unit_price" => $this->unit_price,
            "amount" => $this->amount,
            "user_id" => $this->user_id
        ];
    }
}
