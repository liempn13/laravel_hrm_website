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
        "workplace_name",
        "workingprocess_content",
        "workingprocess_status",
        "profile_id",
        "start_time",
        "end_time"
    ] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
