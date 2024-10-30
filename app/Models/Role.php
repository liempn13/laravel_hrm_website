<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "role";
    protected $primaryKey = "role_id";
    protected $keyType = "integer";
    protected $fillable = [
        "role_id",
        "role_name",
        "description",
    ];
    public $timestamps = false;
    protected $casts = [
        "role_id" => "integer",
        "role_name" => "string",
        "description" => "string",
    ];
}
