<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $table = 'accounts';

    protected $primaryKey = 'account_id';

    protected $fillable = ['username','password'];

    protected $hidden = ['password'];

    protected $casts = ['account_id'=>'string','password'=>'string'];

}
