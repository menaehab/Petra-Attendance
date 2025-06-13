<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::all();

        return view('dashboard' ,compact('groups'));
    }

}