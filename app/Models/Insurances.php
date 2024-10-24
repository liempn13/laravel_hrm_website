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
        "profile_id"
    ];
    public $timestamps = false;
    protected $casts = [""];
}