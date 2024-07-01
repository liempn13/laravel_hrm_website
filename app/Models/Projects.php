<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $table = "decisions";
    protected $primaryKey = "decision_id";
    protected $keyType = "string";
    protected $fillable = [
        "project_name",
        "project_status",] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
