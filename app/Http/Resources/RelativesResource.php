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
                "relative_birthday" => $this->birthday,
                "relative_name" => $this->email,
                "relative_phone" => $this->phone,
            ];
    }
}