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
        // "passwword",
        // "permission",
        // "account_status"
    ] ;
    // public $hidden = ["password","remember_token"] ;
    public $timestamps = false;
    protected $casts = [""] ;
}