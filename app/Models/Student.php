<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}