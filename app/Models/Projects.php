<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = "projects";
    protected $primaryKey = "project_id";
    protected $keyType = "string";
    protected $fillable = [
        "project_id",
        "project_name",
        "project_status",
    ];
    public $timestamps = false;
    protected $casts = [
        "project_id"=>"string",
        "project_name" => "string",
        "project_status" => "integer",
    ];
}
