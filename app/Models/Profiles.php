<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;
    protected $table = "profiles";
    protected $primaryKey = "profile_id";

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
        "profile_status",
        //foriegn key
        "department_id",
        "position_id",
        "enterprise_id",
        "salary_id",
        ] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
