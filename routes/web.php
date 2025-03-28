<?php

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return view('welcome');
});
//reosurce controller
Route::resource('/students', StudentController::class);
Route::resource('/teachers', TeacherController::class);
Route::resource('/courses', CourseController::class);
Route::resource('/batches', BatchController::class);
Route::resource('/enrollments', EnrollmentController::class);
Route::resource('/payments', PaymentController::class);
