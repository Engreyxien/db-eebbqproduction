<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeftoverIngredientsResource extends JsonResource
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
            "ingredient_name" => $this->ingredient_name,
            "quantity" => $this->quantity,
            "unit_price" => $this->unit_price,
            "amount" => $this->amount,
            "user" => $this->user
        ];
    }
}
