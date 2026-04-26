<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            $student->qr = QrCode::size(80)->generate(route('students.show', $student->id));
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
            'picture' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('picture');

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('students', 'public');
        }

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student added.');
    }

    public function show(Student $student)
    {
        $qr = QrCode::size(220)->generate(json_encode([
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
            'picture' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('picture');

        if ($request->hasFile('picture')) {
            if ($student->picture) {
                Storage::disk('public')->delete($student->picture);
            }
            $data['picture'] = $request->file('picture')->store('students', 'public');
        }

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        if ($student->picture) {
            Storage::disk('public')->delete($student->picture);
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}