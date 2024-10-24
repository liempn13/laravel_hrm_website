<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Profiles extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = "profiles";
    protected $primaryKey = "profile_id";
    protected $keyType = "string";
    protected $fillable = [
        "profile_id",
        "profile_name",
        "birthday",
        "place_of_birth",
        "identify_num",
        "id_license_day",
        "gender",
        "phone",
        "email",
        "password",
        "nation",
        "marriage",
        "permission",
        "temporary_address",
        "current_address",
        "profile_status",
        "profile_image",
        //foriegn key
        "department_id",
        "position_id",
        "salary_id",
        "labor_contract_id"
    ];
    public $timestamps = false;
    protected $casts = [""];
}