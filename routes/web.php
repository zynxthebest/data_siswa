<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\StudentImportController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentExport;
use App\Imports\StudentImport;


Route::get('students/import', [StudentImportController::class, 'index'])->name('student.import');
Route::post('students/import', [StudentImportController::class, 'import'])->name('student.import.post');

Route::get('/export-students', function () {
    return Excel::download(new StudentExport, 'students.xlsx');
});
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



    Route::resource('rombel', RombelController::class);
    Route::resource('student', studentController::class);
});

require __DIR__.'/auth.php';
