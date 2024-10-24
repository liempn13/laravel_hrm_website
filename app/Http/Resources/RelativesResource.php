<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RelativesResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                "relative_id" => $this->relative_id,
                "profile_id" => $this->profile_id,
                "relative_name" => $this->relative_name,
                "relative_birthday" => $this->relative_birthday,
                "relative_phone" => $this->relative_phone,
                "relationship" => $this->ralationship,
                "relative_job" => $this->relative_job,
                "relative_nation" => $this->relative_nation,
                "relative_temp_address" => $this->relative_temp_address,
                "relative_current_address" => $this->relative_current_address,
            ];
    }
}