<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        
    // rotte per la risorsa del sito
    Route::get('/books/create',     [BookController::class, 'create'])->name('books.create');
    Route::get('/books/{id}/edit',  [BookController::class, 'edit'])->name('books.edit');
    Route::post('/books',           [BookController::class, 'store'])->name('books.store');
    Route::put('/books/{id}',           [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{id}',           [BookController::class, 'destroy'])->name('books.destroy');

    // rotte per la risorsa author
    Route::resource('authors', AuthorController::class)->except(['index', 'show']);
});

    Route::get('/books',            [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{id}',       [BookController::class, 'show'])->name('books.show');
    Route::resource('authors', AuthorController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')->group(function () {
});

require __DIR__.'/auth.php';



