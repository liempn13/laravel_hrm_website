<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShiftsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "shift_id",
            "shift_name",
            "start_time",
            "end_time",
            "status",
        ];
    }
}