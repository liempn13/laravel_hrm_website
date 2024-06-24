<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatives extends Model
{
    protected $table = 'relatives';

    protected $primaryKey = 'account_id';

    protected $fillable = ['relative_name',''];

    protected $hidden = [''];

    protected $casts = ['account_id'=>'string'];
}
