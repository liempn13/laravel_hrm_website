<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{
    use HasFactory;
    protected $table = "salaries";
    protected $primaryKey = "salary_id";
    protected $keyType = "string";
    protected $fillable = ["",""] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
