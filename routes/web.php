<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;

// Main Website Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Panel Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/projects', [AdminController::class, 'projects'])->name('admin.projects');
Route::get('/admin/clients', [AdminController::class, 'clients'])->name('admin.clients');
Route::get('/admin/portfolio', [AdminController::class, 'portfolio'])->name('admin.portfolio');
Route::get('/admin/team', [AdminController::class, 'team'])->name('admin.team');
Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');