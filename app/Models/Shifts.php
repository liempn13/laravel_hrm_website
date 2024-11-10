<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shifts extends Model
{
    protected $table = "shifts";
    protected $primaryKey = "shift_id";
    protected $keyType = "string";
    protected $fillable = [
        "shift_id",
        "shift_name",
        "start_time",
        "end_time",
    ];
    public $timestamps = false;
    protected $casts = [
        "shift_id" => "string",
        "shift_name" => "string",
        "start_time" => "datetime",
        "end_time" => "datetime",
    ];
}
