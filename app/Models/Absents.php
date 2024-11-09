<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absents extends Model
{
    protected $table = "absents";
    protected $primaryKey = "ID";
    protected $keyType = "integer";
    protected $fillable = [
        "from",
        "reason",
        "to",
        "status",
        "profile_id",
        "days_off"
    ];
    public $timestamps = false;
    protected $casts = [
        "from" => "datetime",
        "to" => 'datetime',
        "reason" => "string",
        "profile_id" => "string",
        "days_off" => "double",
        "status" => "integer",
    ];
}