<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FoodController;

// Register routes
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login routes
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [FoodController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [FoodController::class, 'store'])->name('food.store');
    Route::post('/foods', [FoodController::class, 'store'])->name('foods.store');
});

// Log out route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Welcome page
Route::get('/', function () {
    return view('welcome');
});
