<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnterprisesResource extends JsonResource
{
    public function toArray($request)
    {
        return
        [
            "enterprise_id" => $this->enterprise_id,
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "license_num" => $this->license_num,
            "assign_date" => $this->assign_date,
        ];
    }
}
