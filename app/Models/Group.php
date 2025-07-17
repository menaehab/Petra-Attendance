<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['level', 'name'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function levelRelation()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }
}