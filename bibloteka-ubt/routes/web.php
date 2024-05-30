<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/dashboard',[ProfileController::class,'index'])->name('dashboard');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/students',[StudentController::class,'index'])->name('students');
    Route::post('/students',[StudentController::class,'store'])->name('students.store');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');
    Route::get('/students/order/latest', [StudentController::class, 'orderByLatest'])->name('students.order.latest');
    Route::get('/students/order/earliest', [StudentController::class, 'orderByEarliest'])->name('students.order.earliest');
    Route::get('/students/filter/degree', [StudentController::class, 'filterByDegree'])->name('students.filter.degree');    
    Route::get('/books',[BookController::class,'index'])->name('books');
    Route::post('/books',[BookController::class,'store'])->name('books.store');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::put('/books/{id}',[BookController::class,'update'])->name('books.update');
    Route::get('/books/search',[BookController::class,'search'])->name('books.search');
    Route::get('/books/filter/category', [BookController::class, 'filterByCategory'])->name('books.category');
    Route::get('/loans', [LoanController::class, 'index'])->name('loans');
    Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');
    Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
    Route::put('/loans/{id}', [LoanController::class, 'update'])->name('loans.update');
    Route::delete('/loans/{id}', [LoanController::class, 'destroy'])->name('loans.destroy');
    Route::patch('/loans/{id}/return', [LoanController::class, 'returnBook'])->name('loans.return');
    Route::post('students/checkin', [StudentController::class, 'checkIn'])->name('students.check-in');
});



require __DIR__.'/auth.php';
