<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Session;
use App\Models\Student;
use Livewire\Component;
use App\Models\Attendance;
use App\Http\Requests\AttendanceRequest;

class AttendancePage extends Component
{
    public $code;
    public $group_id;
    public $session_id;
    public $showSession = false;

    public function updatedGroupId()
    {
        if ($this->group_id) {
            $this->showSession = true;
        } else {
            $this->showSession = false;
            $this->session_id = null;
        }
    }

    public function rules()
    {
        return (new AttendanceRequest())->rules();
    }

    public function messages()
    {
        return (new AttendanceRequest())->messages();
    }

    public function submit()
    {
        $this->validate();

        $student = Student::where('code', $this->code)->first();
        if (!$student) {
            session()->flash('failed', __('keywords.student_not_found'));
            return;
        }

        if ($student->group_id != $this->group_id) {
            session()->flash('failed', __('keywords.student_from_different_group'));
            return;
        }

        $alreadyAttended = Attendance::where('student_id', $student->id)
            ->where('session_id', $this->session_id)
            ->exists();

        if ($alreadyAttended) {
            session()->flash('failed', __('keywords.student_already_attended'));
            return;
        }
        Attendance::create([
            'student_id' => $student->id,
            'session_id' => $this->session_id,
            'group_id' => $this->group_id,
        ]);

        session()->flash('success', __('keywords.attendance_success'));
    }

    public function render()
    {
        $groups = Group::all();
        $sessions = Session::where('group_id', $this->group_id)->get();
        return view('livewire.attendance-page', compact('groups', 'sessions'));
    }
}
