<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StocksIngredientsResource extends JsonResource
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
            "ingredients_name" => $this->ingredients_name,
            "beginning_stocks" => $this->beginning_stocks,
            "dispatch_AM" => $this->dispatch_AM,
            "dispatch_PM" => $this->dispatch_PM,
            "ending_stocks" => $this->ending_stocks,
            "user_id" => $this->user_id
        ];
    }
}
