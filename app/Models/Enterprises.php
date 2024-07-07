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
        "enterprise_id",
        "enterprise_name",
        "enterprise_status",
        "email",
        ] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
