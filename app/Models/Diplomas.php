<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplomas extends Model
{
    use HasFactory;
    protected $table = "diplomas";
    protected $primaryKey = "diploma_id";
    protected $fillable = ["",""] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
