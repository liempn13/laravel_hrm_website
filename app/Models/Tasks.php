<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = "tasks";
    protected $primaryKey = "task_id";
    protected $keyType = "integer";
    protected $fillable = [
        "task_id",
        "task_name",
        "task_content",
        "task_status",
    ];
    public $timestamps = false;
    protected $casts = [
        'task_id' => "integer",
        'task_name' => "string",
        'task_content' => "string",
        'task_status' => "integer",
    ];
}
