<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(){
        return view('Attendance');
    }
    public function dashboard(Request $request)
    {
        // $groups = Group::where('level', '=',$request->level)->get();
        $groups = Group::where('level', $request->level)->with('students')->get();
        return view('dashboard' ,compact('groups'));
    }
    public function student(){
        return view('studentdetails');
    }

}
