<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'name',
        'teacher_name',
        'second_teacher_name',
        'datetime',
        'status',
    ];
}
