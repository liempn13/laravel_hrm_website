<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfilesResource extends JsonResource
{
    public function toArray($request)
    {
        return
        [
            "profile_name",
        "gender",
        "birthday",
        "email",
        "phone",
        "identify_num",
        "id_expire_day",
        "position_id",
        "department_id",
        "enterprise_id",
        "salary_id",
        "profile_status"
        ];
    }
}
