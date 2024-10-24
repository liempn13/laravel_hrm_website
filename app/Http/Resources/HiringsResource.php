<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HiringsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "profile_name" => $this->profile_name,
            "birthday" => $this->birthday,
            "place_of_birth" => $this->place_of_birth,
            "gender" => $this->gender,
            "phone" => $this->phone,
            "email" => $this->email,
            "nation" => $this->nation,
            "apply_for" => $this->apply_for,
            "current_address" => $this->current_address,
            "hiring_status" => $this->hiring_status,
            "hiring_profile_image" => $this->hiring_profile_image,
            "work_experience" => $this->work_experience,
        ];
    }
}