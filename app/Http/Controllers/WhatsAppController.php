<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Student;

class WhatsAppController extends Controller
{
    public function attendance(Student $student, $session_id, $status)
    {
        $sattuses = [
            'present' => 'تم حضور',
            'absent' => 'تم غياب',
            'late' => 'تم دخول المدرسة متأخر',
        ];
        $session = Session::find($session_id);
        if (!$session) {
            return redirect()->back()->with('failed', 'Session not found');
        }
        if ($session->group_id != $student->group_id) {
            return redirect()->back()->with('failed', 'Student not found');
        }
        if($status == 'late') {
            $student->attendances()->updateOrCreate([
                'session_id' => $session_id,
                'student_id' => $student->id,
            ], [
                'late' => true,
            ]);
        } else if ($status == 'present') {
            $student->attendances()->updateOrCreate([
                'session_id' => $session_id,
                'student_id' => $student->id,
            ], [
                'late' => false,
            ]);
        }

        $phone = '2' . $student->phone;
        $message = "{$sattuses[$status]} {$student->name} إلى المدرسة";
        $link = 'https://wa.me/' . $phone . '?text=' . urlencode($message);
        return redirect()->away($link);
    }

}