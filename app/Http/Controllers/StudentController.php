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
        $students = Student::latest()->paginate(10);
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

        return $validated;
    }
}
