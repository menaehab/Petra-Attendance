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

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'student_task', 'student_id', 'task_id')->withTimestamps();
    }

    public function attendanceStatuses(): Attribute
    {
        return Attribute::get(function () {
            $sessions = Session::where('group_id', $this->group_id)
                ->orderBy('date')
                ->get();

            $attendances = Attendance::where('student_id', $this->id)
                ->whereIn('session_id', $sessions->pluck('id'))
                ->get()
                ->keyBy('session_id');

            $statuses = [];

            foreach ($sessions as $session) {
                $attendance = $attendances->get($session->id);

                $statuses[] = [
                    'session_id' => $session->id,
                    'date' => $session->date,
                    'attended' => $attendance ? true : false,
                    'late' => $attendance ? $attendance->late : false,
                    'created_at' => $attendance ? $attendance->created_at->toDateTimeString() : null,
                ];
            }

            return $statuses;
        });
    }


}