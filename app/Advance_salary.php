<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance_salary extends Model
{
    protected $fillable = [
        'emp_id', 'month', 'year','advanced_salary'
    ];
}
