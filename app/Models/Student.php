<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
        protected $fillable = ['name', 'phone', 'code', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function attendanceStatuses(): Attribute
    {
        return Attribute::get(function () {
            $sessions = Session::orderBy('date')->get();

            $statuses = [];

            foreach ($sessions as $session) {
                $dateOnly = Carbon::parse($session->date)->toDateString();

                $statuses[$dateOnly] = $this->attendances()
                    ->whereDate('created_at', $dateOnly)
                    ->exists();
            }

            return $statuses;
        });
    }
}
