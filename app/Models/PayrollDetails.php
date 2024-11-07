<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayrollDetails extends Model
{
    protected $table = "payroll_details";
    protected $primaryKey = "";
    protected $keyType = "";
    protected $fillable = [
        "sum",
        "bonus",
        "minus",
        "salary_id",
        "advance_money",
        "month",
        "status"
    ];
    public $timestamps = false;
    protected $casts = [
        "salary_id" => "string",
        "sum" => "double",
        "bonus" => "double",
        "minus" => "double",
        "advance_money" => "double",
        "month" => "date",
        "status" => "boolean"
    ];
}
