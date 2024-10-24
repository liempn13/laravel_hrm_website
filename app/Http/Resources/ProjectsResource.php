<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                'project_id' => $this->project_id,
                'project_name' => $this->project_name,
                'project_status' => $this->project_status,
                'department_id' => $this->department_id,
            ];
    }
}