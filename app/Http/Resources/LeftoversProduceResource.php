<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeftoversProduceResource extends JsonResource
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
            "number_of_fried_chicken" => $this->number_of_fried_chicken,
            "number_of_lumpia_produce" => $this->number_of_lumpia_produce,
            "dispatched_to" => $this->dispatched_to,
            "user_id" => $this->user_id
        ];
    }
}
