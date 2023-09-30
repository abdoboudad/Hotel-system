<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_type',
        'card_number',
        'phone',
        'name',
        'job',
        'work_time',
        'join_date',
        'salary'
    ];

}
