<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.create');
});

Route::post('students/reset-database', [StudentController::class, 'resetDatabase'])->name('students.reset-database');

Route::resource('students', StudentController::class)->only([
    'index', 'create', 'store', 'show', 'destroy'
]);
