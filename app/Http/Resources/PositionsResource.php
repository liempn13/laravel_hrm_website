<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PositionsResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                'position_id' => $this->position_id,
                'position_name' => $this->position_name,
            ];
    }
}