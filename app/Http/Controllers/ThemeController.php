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
        $groups = Group::all();

        return view('dashboard' ,compact('groups'));
    }

}
