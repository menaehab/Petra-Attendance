<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request  $request){


          $student = Student::where('code', $request->code)->first();
          $student->save();
         return to_route('theme.attendance');





    }
}