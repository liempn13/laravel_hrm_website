<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfilesResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                "profile_id" => $this->profile_id,
                "profile_name" => $this->profile_name,
                "gender" => $this->gender,
                "birthday" => $this->birthday,
                'place_of_birth' => $this->place_of_birth,
                "email" => $this->email,
                "phone" => $this->phone,
                "password"=> $this->password,
                "permission"=> $this->permission,
                "identify_num" => $this->identify_num,
                "id_license_day" => $this->id_license_day->format('d/m/Y'),
                "position_id" => $this->position_id,
                "department_id" => $this->department_id,
                "salary_id" => $this->salary_id,
                "labor_contract_id" => $this->labor_contract_id,
                "profile_status" => $this->profile_status,
                "nation" => $this->nation,
                "marriage" => $this->marriage,
                "temporary_address" => $this->temporary_address,
                "current_address" => $this->current_address,
                "profile_image"=> $this->profile_image,
            ];
    }
}