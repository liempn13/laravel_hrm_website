<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurances extends Model
{
    protected $table = "insurance";
    protected $primaryKey = "insurance_id";
    protected $fillable = [
        "insurance_type_name",
        "insurance_percent",
        "start_time",
        "end_time",
        "profile_id",
        "insurance_id",
    ];
    public $timestamps = false;
    protected $casts = [
        "profile_id" => "string",
        "start_time" => "date",
        "end_time" => "date",
        "insurance_type_name" => "string",
        "insurance_id" => "string",
        "insurance_percent" => "double",
    ];
}
