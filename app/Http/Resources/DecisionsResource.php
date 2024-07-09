<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DecisionsResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                "decision_name" => $this->id,
                "decision_content" => $this->decision_content,
                "decision_status" => $this->deccision_status,
                "salary_id" => $this->salary_id,
                "enterprise_id" => $this->enterprise_id,
                "assign_date" => $this->assign_date
            ];
    }
}
