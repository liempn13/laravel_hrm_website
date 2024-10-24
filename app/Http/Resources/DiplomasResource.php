<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiplomasResource extends JsonResource
{
    public function toArray($request)
    {
        return
            [
                "diploma_id" => $this->diploma_id,
                "diploma_degree_name" => $this->diploma_degree_name,
                "diploma_image" => $this->diploma_image,
                "ranking" => $this->ranking,
                "license_date" => $this->license_date,
                "diploma_type" => $this->diploma_type,
                "diploma_name" => $this->diploma_name,
                "granted_by" => $this->granted_by,
                "major" => $this->major,
                "mode_of_study" => $this->mode_of_study,
            ];
    }
}