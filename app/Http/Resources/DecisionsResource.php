<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DecisionsResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                "decision_id" => $this->decision_id,
                "decision_name" => $this->decision_name,
                "decision_content" => $this->decision_content,
                "decision_status" => $this->deccision_status,
                "decision_image" => $this->decision_image,
                "assign_date" => $this->assign_date,
                "profile_id" => $this->profile_id
            ];
    }
}
