<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Student;
use App\Models\Group;
use App\Models\StudentTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);

        $students = Student::whereHas('group', function ($query) use ($task) {
            $query->where('level_id', $task->course->level_id);
        })->get();

        return view('tasks.show', compact('task', 'students'));
    }

    public function updateStatus($taskId, $studentId)
    {
        $student = Student::findOrFail($studentId);
        $student->tasks()->toggle($taskId);

        return back()->with('success','updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Deleted successfully');
    }
}