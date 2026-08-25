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
}
