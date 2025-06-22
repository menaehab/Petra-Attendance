<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class WhatsAppController extends Controller
{
    public function attendance(Student $student, $status)
    {
        $sattuses = [
            'present' => 'تم حضور',
            'absent' => 'تم غياب',
            'late' => 'تم دخول المدرسة متأخر',
        ];
        $phone = '2' . $student->phone;
        $message = "{$sattuses[$status]} {$student->name} إلى المدرسة";
        $link = 'https://wa.me/' . $phone . '?text=' . urlencode($message);
        return redirect()->away($link);
    }

}
