<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Job;
use App\Models\Company;
use App\Models\Category;

// Halaman Depan (Publik)
Route::get('/', function () {
    $totalJobs = Job::count();
    $totalCompanies = Company::count();
    $totalCategories = Category::count();
    $latestJobs = Job::with(['company', 'category'])->latest()->take(6)->get();
    return view('home', compact('totalJobs', 'totalCompanies', 'totalCategories', 'latestJobs'));
})->name('home');

// Autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman Wajib Login (Admin & User)
Route::middleware('auth')->group(function () {
    // Profil Saya
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    // Khusus Admin
    Route::middleware('admin')->group(function () {
        Route::resource('jobs', JobController::class)->except(['index', 'show']);
        Route::resource('companies', CompanyController::class)->except(['index', 'show']);
        Route::resource('categories', CategoryController::class);
        Route::resource('users', UserController::class);
    });

    // Boleh dilihat oleh Admin & User
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
});
