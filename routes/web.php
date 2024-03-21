<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\LesseeProfileController;
use App\Http\Controllers\LessorProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/lessor', [LessorProfileController::class, 'profileForm'])->name('profileForm');
    Route::post('/lessor-profile/store', [LessorProfileController::class, 'store'])->name('lessor.store');
    Route::get('/lessors', [LessorProfileController::class, 'index'])->name('lessors.index');
    Route::get('/lessor-profile/{id}', [LessorProfileController::class, 'show'])->name('profile.show');
    Route::put('/lessor-profiles/{id}', [LessorProfileController::class, 'update'])->name('lessor-profiles.update');
    Route::delete('/lessor-profiles/{id}', [LessorProfileController::class, 'destroy'])->name('lessor-profiles.destroy');

});

Route::middleware(['auth', 'role:lessor'])->name('lessor.')->prefix('lessor')->group(function () {
    Route::get('/lessee', [LesseeProfileController::class, 'index'])->name('LessesForm');
    Route::post('/lessee-profile/store', [LesseeProfileController::class, 'store'])->name('Lessee.store');
    Route::get('/lessee-show', [LesseeProfileController::class, 'showLessee'])->name('lessees.show');
    Route::get('/lessee-profile/{id}', [LesseeProfileController::class, 'show'])->name('profile.show');
    Route::put('/lessee-profiles/{id}', [LesseeProfileController::class, 'update'])->name('lessee-profiles.update');
    Route::delete('/lessee-profiles/{id}', [LesseeProfileController::class, 'destroy'])->name('lessee-profiles.destroy');
    Route::get('/properties', [PropertiesController::class, 'index'])->name('properties');
    Route::post('/properties/store', [PropertiesController::class, 'store'])->name('properties.store');
    Route::get('/contracts/create', [ContractController::class, 'create'])->name('contracts.create');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
