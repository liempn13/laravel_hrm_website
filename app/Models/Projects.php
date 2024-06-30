<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $table = "decisions";
    protected $primaryKey = "decision_id";
    protected $fillable = ["",""] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
