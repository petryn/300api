<?php

use App\Http\Controllers\ApiController;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

//gets all books
Route::get('/books', function () {
    return Book::with('authors')->paginate();
});

//get book with id
Route::get('/books/{id}', function (string $id) {
    return Book::with('authors')->findOrFail($id);
});

//add book
Route::post('/books', [ApiController::class, 'addBook'])->middleware('auth:sanctum');;

//update book with id
Route::put('/books/{id}', [ApiController::class, 'updateBook']);

//delete book
Route::delete('/books/{id}', [ApiController::class, 'deleteBook']);

//get all authors
Route::get('/authors', function () {
    return Author::with('books')->paginate();
});

//get author with id
Route::get('/authors/{id}', function (string $id) {
    return Author::with('books')->findOrFail($id);
});