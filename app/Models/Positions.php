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
        "department_id"
    ];
    public $timestamps = false;
    protected $casts = [
        "position_id" => "string",
        "position_name" => "string",
        "department_id" => "string",
    ];
}
