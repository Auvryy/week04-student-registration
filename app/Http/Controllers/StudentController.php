<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Show all registered students.
     */
    public function index(Request $request): View
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('student_id', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $students = $query->latest()->paginate(10)->withQueryString();
        return view('students.index', compact('students'));
    }

    /**
     * Show the registration form.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly registered student after validation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'     => 'required|string|max:50|unique:students,student_id',
            'first_name'     => 'required|string|max:100',
            'middle_name'    => 'nullable|string|max:100',
            'last_name'      => 'required|string|max:100',
            'email'          => 'required|email|max:150|unique:students,email',
            'mobile_number'  => 'required|numeric',
            'gender'         => 'required|string',
            'date_of_birth'  => 'required|date',
            'program'        => 'required|string',
            'year_level'     => 'required|string',
            'address'        => 'required|string',
            'profile_picture'=> 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $student = Student::create($validated);

        return redirect()
            ->route('students.create')
            ->with('success', 'Student registered successfully!')
            ->with('registered_student_id', $student->id)
            ->with('registered_student_name', $student->full_name)
            ->with('registered_student_program', $student->program);
    }

    /**
     * Display the specified registered student.
     */
    public function show(string|int $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }
}
