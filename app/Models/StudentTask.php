<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class StudentTask extends Pivot
{
    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}