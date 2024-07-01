<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprises extends Model
{
    use HasFactory;
    protected $table = "enterprises";
    protected $primaryKey = "enterprise_id";
    protected $fillable = [
        "enterprise_name",
        ""] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
