<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;
    protected $table = "permissions";
    protected $primaryKey = "permission_id";
    protected $keyType = "integer";
    protected $fillable = [
        "permission_id",
        "permission_name",
        "description"
    ];
    public $timestamps = false;
    protected $casts = [
        "permission_id" => "string",
        "permission_name" => "string",
        "description" => "string",
    ];
}
