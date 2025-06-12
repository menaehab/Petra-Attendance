<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('students.create');
    }

    public function store(StudentRequest $request): \Illuminate\Http\RedirectResponse
    {
        Student::create($request->validated());
        return redirect()->route('students.index')->with('success', 'Created successfully');
    }

    public function show(Student $student): \Illuminate\Contracts\View\View
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student): \Illuminate\Contracts\View\View
    {
        return view('students.edit', compact('student'));
    }

    public function update(StudentRequest $request, Student $student): \Illuminate\Http\RedirectResponse
    {
        $student->update($request->validated());
        return redirect()->route('students.index')->with('success', 'Updated successfully');
    }

    public function destroy(Student $student): \Illuminate\Http\RedirectResponse
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Deleted successfully');
    }

    public function import(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);
        Excel::import(new StudentImport, $request->file('file'));
        return redirect()->route('students.index')->with('success', 'Imported successfully');
    }
}