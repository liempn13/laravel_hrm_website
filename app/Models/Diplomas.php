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
        "diploma_degree_name", // tên bằng cấp/ chứng chỉ
        "diploma_type",// loại ? bằng cấp hoặc chứng chỉ
        "mode_of_study", //hệ đào tạo
        "ranking", // xếp loại
        "license_date", // ngày cấp
        "grandted_by", // cấp bởi
        "major",// nghành nghề
        "diploma_image", // ảnh bằng cấp/ chứng chỉ
        ];
    public $timestamps = false;
    protected $casts = [""] ;
}