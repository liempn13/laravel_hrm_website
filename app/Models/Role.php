<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $primaryKey = "role_id";
    protected $keyType = "integer";
    protected $fillable = [
        "role_id",
        "role_name",
    ];
    public $timestamps = false;
    protected $casts = [
        "role_id" => "integer",
        "role_name" => "string",
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'role_permission');
    }

    public function users()
    {
        return $this->belongsToMany(Profiles::class, 'profiles');
    }
}