<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Session;
use App\Models\Student;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions=Session::all();
        return view('sessions.index',compact('sessions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();
        return view('sessions.create',compact('groups'));

    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {

        Session::create([
            'group_id' => $request->group,
            'date' => $request->start_time,
        ]);


        return redirect()->route('sessions.index')->with('success', 'Created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $session=Session::findOrFail($id);
        $students = Student::where('group_id', $session->group_id)
        ->with(['attendances' => function ($query) use ($id) {
            $query->where('session_id', $id);
        }])
        ->get();
        return view('sessions.show',compact('session','students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $session=Session::find($id);
        $groups = Group::all();
        return view('sessions.edit',compact('session','groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $session=Session::find($id);
        $session->update([
            'group_id' => $request->group,
            'date' => $request->start_time,
        ]);

        return redirect()->route('sessions.index')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('sessions.index')->with('success', 'Deleted successfully');
    }
}