<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_task')
            ->withPivot('is_completed')
            ->withTimestamps();
    }

    public function course()
    {
        return $this->BelongsTo(Course::class);
    }
}