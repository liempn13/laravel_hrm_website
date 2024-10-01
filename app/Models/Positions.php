<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    use HasFactory;
    protected $table = "positions";
    protected $primaryKey = "position_id";

    protected $keyType = "string";

    protected $fillable = [
        "position_id",
        "position_name",
        "enterprise_id"
        ] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
