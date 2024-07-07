<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentsResource extends JsonResource
{
    public function toArray($request)
    {
        return
        [
            'account_id' => $this->account_id,
            'username' => $this->username,
            'passsword' => $this->password,
            'account_status' => $this->account_status,
            'enterprise_id' => $this->enterprise_id,
        ];
    }
}
