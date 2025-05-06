<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect(route('students.index'));
// });


Auth::routes();
Route::middleware(['auth'])->group(function () {
    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/', function () {
        return redirect(route('students.index'));
    });
    Route::resource('students', StudentController::class);
});
