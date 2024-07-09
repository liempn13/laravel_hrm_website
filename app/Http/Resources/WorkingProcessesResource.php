<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkingProcessesResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                'workingprocesses_id' => $this->workingprocesses_id,
                'profile_id' => $this->profile_id,
                'workingprocesses_content' => $this->workingprocesses_content,
                'workingprocesses_starttime' => $this->workingprocesses_starttime->format('d/m/Y'),
                'workingprocesses_endtime' => $this->workingprocesses_endtime->format('d/m/Y'),
                'workingprocesses_status' => $this->workingprocesses_status,
                'workingprocesses_workplace' => $this->workingprocesses_workplace,
                'enterprise_id' => $this->enterprise_id,
            ];
    }
}
