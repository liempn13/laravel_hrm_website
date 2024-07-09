<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $primaryKey = "project_id";
    protected $keyType = "string";
    protected $fillable = [
        "project_name",
        "project_status",
        "department_id",
        "enterprise_id",
        ] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
