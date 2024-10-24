<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LaborContractsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "labor_contract_id" => $this->labor_contract_id,
            "start_time" => $this->start_time,
            "end_time" => $this->end_time,
            "image" => $this->image,
            "enterprise_id" => $this->enterprise_id
        ];
    }
}