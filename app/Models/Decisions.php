<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decisions extends Model
{
    use HasFactory;
    protected $table = "decisions";
    protected $primaryKey = "decision_id";
    protected $fillable = [
        "decision_name",
        "decision_content",
        "profile_id",
        "assign_date",
        "decision_image",
        "decision_status",
        ] ;
    public $timestamps = false;
    protected $casts = [""] ;
}