<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Accounts extends Model
{
    use HasFactory;
    protected $table = "accounts";
    protected $primaryKey = "account_id";

    protected $fillable = [
        "username",
        "password",
        "permission",
        "account_status"
    ];
    public $hidden = [];
    public $timestamps = false;
    protected $casts = [""];
}