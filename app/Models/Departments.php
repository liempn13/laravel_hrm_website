<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;
    protected $table = "departments";
    protected $primaryKey = "department_id";
    protected $keyType = "string";
    protected $fillable = [
        "department_name",
    "department_status",
    "enterprise_id"] ;
    public $timestamps = false;
    protected $casts = [""] ;
}