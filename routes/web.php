<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserSearchController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard/recruiter', function () { 
        return view('dashboard.recruiter');
    })->name('dashboard.recruiter');

    Route::get('/dashboard/chercheur', function () {
        return view('dashboard.chercheur');
    })->name('dashboard.chercheur');

    Route::get('/search', [UserSearchController::class, 'index'])->name('search.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->middleware('auth')->name('users.show');
    Route::get('/job-offers', [JobOfferController::class, 'index'])->name('job-offers.index');
    Route::get('/job-offers/{jobOffer}', [JobOfferController::class, 'show'])->name('job_offers.show');

});

require __DIR__.'/auth.php';
