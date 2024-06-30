<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingProcesses extends Model
{
    use HasFactory;
    protected $table = "workingprocesses";
    protected $primaryKey = "workingprocess_id";
    protected $fillable = ["",""] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
