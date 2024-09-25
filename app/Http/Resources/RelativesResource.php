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
                "relative_birthday" => $this->relative_birthday,
                "relative_name" => $this->relative_name,
                "relative_phone" => $this->relative_phone,
            ];
    }
}
