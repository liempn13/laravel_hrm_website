<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TasksResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "task_name" => $this->task_name,
            "task_content" => $this->task_content,
            "task_status" => $this->task_status,
            "task_id" => $this->task_id
        ];
    }
}