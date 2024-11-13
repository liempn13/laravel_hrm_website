<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProcesses extends Model
{
    protected $table = "trainingprocesses";
    protected $primaryKey = "trainingprocesses_id";
    protected $keyType = "string";
    protected $fillable = [
        'trainingprocesses_id',
        "trainingprocesses_name",
        "trainingprocesses_content",
        "trainingprocesses_status",
        "start_time",
        "end_time",
        'profile_id'
    ];
    public $timestamps = false;
    protected $casts = [
        'trainingprocesses_id' => "string",
        'trainingprocesses_name' => "string",
        'trainingprocesses_content' => "string",
        'profile_id' => "string",
        'start_time' => "date",
        'end_time' => "date",
        'trainingprocesses_status' => "integer",
    ];
}
