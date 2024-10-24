<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AbsentsResource extends JsonResource
{    public function toArray($request)
    {
        return [
            "ID" => $this->ID,
            "from" => $this->from,
            "to" => $this->to,
            "reason" => $this->reason,
            "profile_id" => $this->profile_id,
            "days_off" => $this->days_off,
            "status" => $this->status,
        ];
    }
}
