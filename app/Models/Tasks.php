<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = "tasks";
    protected $primaryKey = "task_id";
    protected $keyType = "string";
    protected $fillable = [
        "task_name",
        "task_content",
        "task_status",
    ];
    public $timestamps = false;
    protected $casts = [""];
}