<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.create');
});

Route::resource('students', StudentController::class)->only([
    'index', 'create', 'store', 'show'
]);
