<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InsurancesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "insurance_id" => $this->insurance_id,
            "insurance_type_name" => $this->insurance_type_name,
            "insurance_percent" => $this->insurance_percent,
            "start_time" => $this->start_time,
            "end_time" => $this->end_time,
            "profile_id" => $this->profile_id
        ];
    }
}