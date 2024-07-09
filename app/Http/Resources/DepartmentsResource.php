<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentsResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                "department_id" => $this->deccision_content,
                "department_name" => $this->deparment_name,
                "department_status" => $this->deccision_status,
                "enterprise_id" => $this->enterprise_id
            ];
    }
}
