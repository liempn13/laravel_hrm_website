<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;
    protected $table = "accounts";
    protected $primaryKey = "account_id";

    protected $fillable = [
        "username",
        "permission",
        "account_status"
    ] ;
    public $hidden = ["password"] ;
    public $timestamps = false;
    protected $casts = [""] ;
}
