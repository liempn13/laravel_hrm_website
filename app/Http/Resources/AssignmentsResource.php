<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentsResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "assignment_id" => $this->assigment_id,
            "profile_id" => $this->profile_id,
            "task_id" => $this->task_id,
            "project_id" => $this->project_id,
        ];
    }
}