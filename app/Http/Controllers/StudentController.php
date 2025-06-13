<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    public function index($id): View
    {
        $students = Student::where('group_id', $id)->latest()->get();

        $group = Group::where('id', $id)->first();
        return view('students.index', compact('students','group'));
    }

    public function create(): View
    {
        $groups = Group::get();

        return view('students.create',compact('groups'));
    }

    public function store(StudentRequest $request): RedirectResponse
    {
        Student::create($request->validated());
        return redirect()->route('dashboard')->with('success', 'Created successfully');
    }

    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        $groups = Group::get();
        return view('students.edit', compact('student','groups'));
    }

    public function update(StudentRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->validated());
        return redirect()->route('dashboard')->with('success', 'Updated successfully');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();
        return redirect()->route('dashboard')->with('success', 'Deleted successfully');
    }

    public function importPage(): View
    {
        $groups = Group::get();
        return view('students.import', compact('groups'));
    }

    public function import(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'file' => 'required|file|mimes:xlsx,xls,csv'
        ]);

        $import = new StudentImport($data['group_id']);

        Excel::import($import, $data['file']);

        if ($import->failures()->isNotEmpty()) {
            return redirect()->back()->with([
                'failures' => $import->failures(),
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Imported successfully');
    }
}
