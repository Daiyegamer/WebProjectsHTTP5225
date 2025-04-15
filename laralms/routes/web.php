<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/students', function () {
//     return view('students.index');
// });
Route::resource('students', StudentController::class);
Route::resource(name: 'courses', controller: CourseController::class);
