<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignments extends Model
{
    protected $table = "assigments";
    protected $primaryKey = "assigment_id";
    protected $keyType = "string";
    protected $fillable = [
        "assigment_id",
        "profile_id",
        "project_id",
        "task_id",
    ];
    public $timestamps = false;
    protected $casts = [""];
}
