<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentsResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                "department_id" => $this->department_id,
                "department_name" => $this->department_name,
            ];
    }
}