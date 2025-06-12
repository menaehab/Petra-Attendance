<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
        protected $fillable = ['name', 'phone', 'code', 'streak', 'group_id'];

    // الطالب ينتمي لجروب
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    // علاقة الطالب بالحضور (Many To Many من خلال جدول attendances)
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
