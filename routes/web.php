<?php

use App\Http\Controllers\EstimateByCustomDataController;
use App\Http\Controllers\EstimateByDataResultController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

//require __DIR__.'/auth.php';



Route::name('estimate.')->group(function (){

    Route::get('estimate-by-data' , [ EstimateByCustomDataController::class, 'create' ] )->name('data');
    Route::post('estimate-by-data' , [ EstimateByCustomDataController::class, 'store' ] )->name('data.store');
    Route::get('estimate-by-data-result/{hash}' , [ EstimateByDataResultController::class, 'show' ] )->name('data.result');

});













