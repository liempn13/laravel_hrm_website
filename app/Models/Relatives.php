<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatives extends Model
{
    use HasFactory;
    protected $table = "relatives";
    protected $primaryKey = "relative_id";
    protected $fillable = [
        "relative_name",
        "relationship",
        "relative_phone",
        "relative_birthday",
        "relative_temp_address",
        "relative_current_address",
        "relative_nation",
        "relavtive_job",
        "profile_id"
    ];
    public $timestamps = false;
    protected $casts = [""];
}
