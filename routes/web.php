<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//------------>> Books:read <<------------//

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/show/{id}', [BookController::class, 'show'])->name('books.show');

//------------>> Books:create <<------------//

Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/store', [BookController::class, 'store'])->name('books.store');

//------------>> Books:update <<------------//

Route::get('/books/edit/{id}', [CategoryController::class, 'edit'])->name('books.edit');
Route::post('/books/update/{id}', [CategoryController::class, 'update'])->name('books.update');

//------------>> Books:delete <<------------//
Route::get('/books/delete/{id}', [CategoryController::class, 'delete'])->name('books.delete');

// ------------------------------>>>>>>>>>><<<<<<<<<<------------------------------ //

//------------>> Categories:read <<------------//

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');

//------------>> Categories:create <<------------//

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

//------------>> Categories:update <<------------//

Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');

//------------>> Categories:delete <<------------//

Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
