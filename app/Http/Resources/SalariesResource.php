<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalariesResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                'salary_id' => $this->salary_id,
                'salary_name' => $this->salary_name,
                'salary' => $this->salary,
                'allowances' => $this->allowances,
                'salary_status' => $this->salary_status,
                'enterprise_id' => $this->enterprise_id,
            ];
    }
}
