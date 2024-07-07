<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DecisionsResource extends JsonResource
{
    public function toArray($request)
    {
        return
        [
            "decision_name",
        "decision_content",
        "decision_status",
        ];
    }
}
