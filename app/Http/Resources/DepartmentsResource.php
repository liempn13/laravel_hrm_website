<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentsResource extends JsonResource
{
    public function toArray($request)
    {
        return
        [
            "department_name",
    "department_status",
    "enterprise_id"
        ];
    }
}
