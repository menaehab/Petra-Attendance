<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'group_id'];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}