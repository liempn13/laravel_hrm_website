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
        "profile_name",
        "profile_status",
        "identify_num",
        "id_expire_day",
        "gender",
        "phone",
        "email",
        "department_id",
        "position_id",
        "birthday",
        "enterprise_id",
        "salary_id",
        ] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
