<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingProcesses extends Model
{
    use HasFactory;
    protected $table = "workingprocesses";
    protected $primaryKey = "workingprocess_id";
    protected $fillable = [
        'workingprocess_id',
        'workplace_name',
        "workingprocess_content",
        "workingprocess_status",
        "profile_id",
        "start_time",
        "end_time"
    ];
    public $timestamps = false;
    protected $casts = [
        'workingprocess_id' => "string",
        'workplace_name' => "string",
        'workingprocess_content' => "string",
        'profile_id' => "string",
        'start_time' => "date",
        'end_time' => "date",
        'workingprocess_status' => "integer",
    ];
}
