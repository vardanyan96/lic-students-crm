<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lesson extends Model
{
    protected $fillable = [
        'name',
        'teacher_name',
        'second_teacher_name',
        'datetime',
        'status',
    ];

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('status', 'answer');
    }
}
