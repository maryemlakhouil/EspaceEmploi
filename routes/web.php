<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserSearchController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecruterController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AmitieController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


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

    Route::middleware(['auth', 'role:recruiter'])->group(function () {
        Route::get('/recruiter/job-offers/create', [JobOfferController::class,'create'])->name('job-offers.create');
        Route::post('/recruiter/job-offers', [JobOfferController::class,'store'])->name('job-offers.store');
        Route::get('/recruiter/job-offers/{jobOffer}/edit', [JobOfferController::class,'edit'])->name('job-offers.edit');
        Route::patch('/recruiter/job-offers/{jobOffer}', [JobOfferController::class,'update'])->name('job-offers.update');
        Route::patch('/recruiter/job-offers/{jobOffer}/close', [JobOfferController::class,'close'])->name('job-offers.close');
    });

    Route::post('/job-offers/{jobOffer}', [ApplicationController::class, 'store'])->middleware('auth')->name('applications.store');
    Route::get('/recruiter/applications',[RecruterController::class,'applications'])->name('recruiter.applications');
    Route::patch('/applications/{application}/status',[RecruterController::class, 'updateStatus'])->name('applications.updateStatus');

    Route::post('/friends/{user}', [AmitieController::class, 'send'])->name('friends.send');
    Route::post('/friends/{amitie}/accept', [AmitieController::class, 'accept'])->name('friends.accept');
    Route::post('/friends/{amitie}/reject', [AmitieController::class, 'reject'])->name('friends.reject');





});

require __DIR__.'/auth.php';
