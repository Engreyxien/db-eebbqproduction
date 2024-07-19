<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StocksChickensResource extends JsonResource
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
            "chicken_kilo_types" => $this->chicken_kilo_types,
            "beginning_stocks" => $this->beginning_stocks,
            "chops_made" => $this->chops_made,
            "dispatch_AM" => $this->dispatch_AM,
            "dispatch_PM" => $this->dispatch_PM,
            "ending_stocks" => $this->ending_stocks,
            "user" => $this->user
        ];
    }
}
