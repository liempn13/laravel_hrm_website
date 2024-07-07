<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiplomasResource extends JsonResource
{
    public function toArray($request)
    {
        return
        [
            "diploma_name",
        "enterprise_id"
        ];
    }
}
