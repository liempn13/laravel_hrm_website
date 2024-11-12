<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaborContracts extends Model
{
    protected $table = "labor_contract";
    protected $primaryKey = "labor_contract_id";
    protected $fillable = [
        "labor_contract_id",
        "image",
        "start_time",
        "end_time",
        "enterprise_id",
        "department_id",
    ];
    public $timestamps = false;
    protected $casts = [
        "labor_contract_id" => "string",
        "end_time" => "datetime",
        "start_time" => "datetime",
        "image" => "string",
        "enterprise_id" => "integer",
        "department_id" => "string",
    ];
}
