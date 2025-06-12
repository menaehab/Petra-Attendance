<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(){
        return view('Attendance');
    }
public function dashboard(Request $request)
{
    dd(request()->route('level'));
    return view('dashboard');
}
    public function student(){
        return view('studentdetails');
    }

}
