<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
