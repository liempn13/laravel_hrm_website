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
        "shift_name",
        "start_time",
        "end_time",
        "status",
    ];
    public $timestamps = false;
    protected $casts = [""];
}
