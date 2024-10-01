<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatives extends Model
{
    use HasFactory;
    protected $table = "relatives";
    protected $primaryKey = "profile_id";
    protected $fillable = ["relatives_name", "relatives_phone", "relatives_birthday"];
    public $timestamps = false;
    protected $casts = [""];
}
