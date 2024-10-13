<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountsResource extends JsonResource
{
    public function toArray($request)
    {
        return
        [
            'account_id' => $this->account_id,
            'email_or_phone' => $this->email_or_phone,
            'password' => $this->password,
            'account_status' => $this->account_status,
            'enterprise_id' => $this->enterprise_id,
        ];
    }
}
