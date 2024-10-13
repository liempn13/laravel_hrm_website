<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = "accounts";
    protected $primaryKey = "account_id";

    protected $fillable = [
        "email_or_phone",
        "permission",// mặc định 0 là superadmin, 1 là admin, 2 là nhân viên
        'enterprise_id',
        'password',
        "account_status"
    ];
    public $hidden = ['password', 'remember_token'];
    public $timestamps = false;
    protected $casts = ["permission"=>'integer'];
}
