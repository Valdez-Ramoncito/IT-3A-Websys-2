<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('student_number', 'like', '%' . $search . '%')
                  ->orWhere('course', 'like', '%' . $search . '%');
        }

        $students = $query->get()->map(function ($student) {
            $student->qr = QrCode::size(100)->generate(route('students.show', $student->id));
            return $student;
        });

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_number' => 'required|unique:students',
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required',
            'email' => 'required|email',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created.');
    }

    public function show(Student $student)
    {
        $qr = QrCode::size(250)->generate(json_encode([
            'student_number' => $student->student_number,
            'name' => $student->name,
            'course' => $student->course,
            'year_level' => $student->year_level,
            'email' => $student->email,
        ]));

        return view('students.show', compact('student', 'qr'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_number' => 'required|unique:students,student_number,' . $student->id,
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required',
            'email' => 'required|email',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}