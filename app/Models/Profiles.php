<?php

namespace App\Models;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class Profiles extends Model
{
    use Notifiable, MustVerifyEmail, HasFactory, HasApiTokens;

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
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = false;
    protected $casts = [
        "profile_id" => "string",
        "profile_name" => "string",
        "profile_status" => "integer",
        "identify_num" => "string",
        "id_license_day" => "date",
        "gender" => "boolean",
        "phone" => "string",
        "email" => "string",
        "birthday" => "date",
        "password" => "string",
        "marriage" => "boolean",
        "temporary_address" => "string",
        "current_address" => "string",
        "nation" => "string",
        "permission" => "integer",
        "place_of_birth" => "string",
        //foriegn key
        "department_id" => "string",
        "position_id" => "string",
        "salary_id" => "string",
        "labor_contract_id" => "string",
    ];
}
