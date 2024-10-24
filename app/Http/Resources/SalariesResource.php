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
                'salary_coefficient' => $this->salary_coefficient,
                'allowances' => $this->allowances,
                'personal_tax'=>$this->personal_tax,
                'advance_money'=>$this->advance_money,
                'bonus'=>$this->bonus,
                'minus'=>$this->minus
            ];
    }
}