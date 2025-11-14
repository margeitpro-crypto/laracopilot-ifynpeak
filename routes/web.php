<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SchoolAuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\StudentController;

// Main Website Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/schools', [HomeController::class, 'schools'])->name('schools');
Route::get('/results', [HomeController::class, 'results'])->name('results');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Panel Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/schools', [AdminController::class, 'schools'])->name('admin.schools');
Route::get('/admin/students', [AdminController::class, 'students'])->name('admin.students');
Route::get('/admin/results', [AdminController::class, 'results'])->name('admin.results');
Route::get('/admin/subjects', [AdminController::class, 'subjects'])->name('admin.subjects');
Route::get('/admin/grades', [AdminController::class, 'grades'])->name('admin.grades');
Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');

// School Authentication Routes
Route::get('/school/login', [SchoolAuthController::class, 'showLogin'])->name('school.login');
Route::post('/school/login', [SchoolAuthController::class, 'login']);
Route::post('/school/logout', [SchoolAuthController::class, 'logout'])->name('school.logout');

// School Panel Routes
Route::get('/school/dashboard', [SchoolController::class, 'dashboard'])->name('school.dashboard');
Route::get('/school/students', [SchoolController::class, 'students'])->name('school.students');
Route::get('/school/results', [SchoolController::class, 'results'])->name('school.results');
Route::get('/school/subjects', [SchoolController::class, 'subjects'])->name('school.subjects');
Route::get('/school/classes', [SchoolController::class, 'classes'])->name('school.classes');
Route::get('/school/teachers', [SchoolController::class, 'teachers'])->name('school.teachers');
Route::get('/school/reports', [SchoolController::class, 'reports'])->name('school.reports');
Route::get('/school/profile', [SchoolController::class, 'profile'])->name('school.profile');

// Student Authentication Routes
Route::get('/student/login', [StudentAuthController::class, 'showLogin'])->name('student.login');
Route::post('/student/login', [StudentAuthController::class, 'login']);
Route::post('/student/logout', [StudentAuthController::class, 'logout'])->name('student.logout');

// Student Panel Routes
Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
Route::get('/student/results', [StudentController::class, 'results'])->name('student.results');
Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
Route::get('/student/subjects', [StudentController::class, 'subjects'])->name('student.subjects');
Route::get('/student/attendance', [StudentController::class, 'attendance'])->name('student.attendance');