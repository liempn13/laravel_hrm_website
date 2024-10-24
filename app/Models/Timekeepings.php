<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timekeepings extends Model
{
    protected $table = "timekeepings";
    protected $primaryKey = "timekeeping_id";
    protected $keyType = "string";
    protected $fillable = [
        "checkin",
        "checkout",
        "date",
        "late",
        "leaving_soon",
        "status",
        "shift_id",
        "profile_id"
    ];
    public $timestamps = false;
    protected $casts = [""];
}
