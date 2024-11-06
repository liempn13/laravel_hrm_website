<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{
    protected $table = "salaries";
    protected $primaryKey = "salary_id";
    protected $keyType = "string";
    protected $fillable = [
        "salary_id", // Thêm vào đây
        "salary_coefficient",
        "allowances",
        "personal_tax",
    ];
    public $timestamps = false;
    protected $casts = [
        "salary_id" => "string",
        "salary_coefficient" => "double",
        "allowances" => "double",
        "personal_tax" => "double",
    ];
}