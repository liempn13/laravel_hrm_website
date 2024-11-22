<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplomas extends Model
{
    use HasFactory;
    protected $table = "diplomas";
    protected $primaryKey = "diploma_id";
    protected $keyType = "string";
    protected $fillable = [
        "diploma_id",
        "diploma_degree_name", // tên bằng cấp/ chứng chỉ
        "diploma_image", // ảnh bằng cấp/ chứng chỉ
        "mode_of_study", //hệ đào tạo
        "ranking", // xếp loại
        "license_date", // ngày cấp
        "diploma_type", // loại ? bằng cấp hoặc chứng chỉ
        "major", // nghành nghề
        "granted_by", // cấp bởi
        "profile_id"
    ];
    public $timestamps = false;
    protected $casts = [
        "diploma_id" => "string",
        "diploma_degree_name" => "string",
        "diploma_image" => "string",
        "mode_of_study" => "string",
        "ranking" => "string",
        "license_date" => "date",
        "major" => "string",
        "diploma_type" => "string",
        "granted_by" => "string",
        "profile_id" => "string",
    ];
}
