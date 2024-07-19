<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeftoversTurnoverResource extends JsonResource
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
            "branch" => $this->branch,
            "date_received" => $this->date_received,
            "time_received" => $this->time_received,
            "item_number" => $this->item_number,
            "number_of_items" => $this->number_of_items,
            "quantity" => $this->quantity,
            "delivered_by" => $this->delivered_by,
            "user" => $this->user
        ];
    }
}
