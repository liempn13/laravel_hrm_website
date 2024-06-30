<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatives extends Model
{
    use HasFactory;
    protected $table = "relatives";
    protected $primaryKey = "relative_id";
    protected $fillable = ["",""] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
