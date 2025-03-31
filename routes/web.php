<?php

use App\Http\Controllers\AuthController;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EnrollmentController;

//Default page
Route::get("/",[AuthController::class,"index"]);
// Authentication routes means go to the check function in the controller class. login.check is the name given the form submitted
Route::post("/login",[AuthController::class,"check"])->name("login.check");
// Authentication routes means go to the logout function in the controller class
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

//This route will only be accessible for authenticated users
Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');
//resource controller

Route::resource('/students', StudentController::class);
Route::resource('/teachers', TeacherController::class);
Route::resource('/courses', CourseController::class);
Route::resource('/batches', BatchController::class);
Route::resource('/enrollments', EnrollmentController::class);
Route::resource('/payments', PaymentController::class);
Route::get('report/report1/{pid}', [ReportController::class, 'report1']);
