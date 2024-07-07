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
        "gender",
        "birthday",
        "email",
        "phone",
        "identify_num",
        "id_expire_day",
        "position_id",
        "department_id",
        "enterprise_id",
        "salary_id",
        "profile_status"
        ] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
