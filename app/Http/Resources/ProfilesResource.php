<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfilesResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                "profile_name" => $this->profile_name,
                "gender" => $this->deccision_content,
                "birthday" => $this->birthday,
                "email" => $this->email,
                "phone" => $this->phone,
                "identify_num" => $this->identify_num,
                "id_expire_day" => $this->id_exprire_day->format('d/m/Y'),
                "position_id" => $this->position_id,
                "department_id" => $this->department_id,
                "enterprise_id" => $this->enterprise_id,
                "salary_id" => $this->salary_id,
                "profile_status" => $this->profile_status
            ];
    }
}
