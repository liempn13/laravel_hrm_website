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
        "trainingprocesses_name",
        "trainingprocesses_content",
        "trainingprocesses_status",
        "start_time",
        "end-time"
    ];
    public $timestamps = false;
    protected $casts = [""];
}
