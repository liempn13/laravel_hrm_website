<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RelativesResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                "profile_id" => $this->profile_id,
                "relatives_birthday" => $this->relatives_birthday,
                "relatives_name" => $this->relatives_name,
                "relatives_phone" => $this->relatives_phone,
            ];
    }
}
