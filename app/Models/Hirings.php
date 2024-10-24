<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hirings extends Model
{
    protected $table = "hirings";
    protected $primaryKey = "hiring_profile_id";
    protected $fillable = [
        "profile_name",
        "birthday",
        "place_of_birth",
        "gender",
        "phone",
        "email",
        "nation",
        "apply_for",
        "current_address",
        "hiring_status",
        "hiring_profile_image",
        "work_experience"
    ];
    public $timestamps = false;
    protected $casts = [""];
}