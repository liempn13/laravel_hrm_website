<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnterprisesResource extends JsonResource
{
    public function toArray($request)
    {
        return
        [
            "enterprise_id",
            "name",
            "email",
            "phone",
            "licensenum",
            "assign_date",
            "enterprise_status",
        ];
    }
}
