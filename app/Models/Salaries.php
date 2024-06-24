<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{
    protected $table = 'salaries';

    protected $primaryKey = 'account_id';

    protected $fillable = ['salary_name',''];

    protected $hidden = [''];

    protected $casts = ['account_id'=>'string'];
}
