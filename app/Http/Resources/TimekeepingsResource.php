<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimekeepingsResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "checkin"=>$this->checkin,
            "checkout" => $this->checkout,
            "date" => $this->date,
            "late" => $this->late,
            "leaving_soon" => $this->leaving_soon,
            "status" => $this->status,
            "shift_id" => $this->shift_id,
            "profile_id" => $this->profile_id
        ];
    }
}