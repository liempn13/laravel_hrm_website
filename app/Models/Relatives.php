<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatives extends Model
{
    use HasFactory;
    protected $table = "relatives";
    protected $primaryKey = "relative_id";
    protected $keyType = "integer";
    protected $fillable = [
        "relative_id",
        "relative_name",
        "relative_phone",
        "relative_birthday",
        "relationship",
        "relative_job",
        "relative_nation",
        "relative_temp_address",
        "relative_current_address",
        "profile_id",
    ];
    public $timestamps = false;
    protected $casts = [
        "relative_id" => 'integer',
        "relative_name" => "string",
        "relative_phone" => "string",
        "relative_birthday" => "date",
        "relationship" => "string",
        "relative_job" => "string",
        "relative_nation" => "string",
        "relative_temp_address" => "string",
        "relative_current_address" => "string",
        "profile_id" => "string",
    ];
}
