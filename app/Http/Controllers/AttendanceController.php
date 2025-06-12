<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{




    public function store(Request $request){


        dd($request);
        // $code=$request->code;
        // $row =Student::where('code','=' ,$code)->first();
        // $row->streak++;
        // $row->save();
        // dd($row);
        // return to_route('Attendance');

    }
}
