<?php

namespace App\Http\Controllers;

use App\Jobs\AuthorLatestBook;
use App\Models\Book;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Adds book
     *
     * @return json
     */
    public function addBook(Request $req)
    {
        //validate input data
        $validData = $req->validate([
            'title' => 'required|max:255',
            'authors' => 'required|array',
            'authors.*' => 'integer|exists:authors,id',
        ]);

        //add new book
        $book = new Book($validData);
        $book->save();

        //attach authors to book
        $book->authors()->sync($validData['authors']);

        AuthorLatestBook::dispatch($book);

        return response()->json(['status' => 'ok', 'book_id' => $book->id]);
    }

    /**
     * Deletes book
     *
     * @return json
     */
    public function deleteBook(string $id)
    {
        $book = Book::findOrFail($id);
        $book->authors()->detach();
        $book->delete();

        return response()->json(['status' => 'ok']);
    }

    /**
     * Updates book
     *
     * @return json
     */
    public function updateBook(Request $req, string $id)
    {
        //validate input data
        $validData = $req->validate([
            'id' => 'integer|exists:books,id',
            'title' => 'required|max:255',
            'authors' => 'array',
            'authors.*' => 'integer|exists:authors,id',
        ]);

        //find and update book
        $book = Book::findOrFail($id);
        $book->title = $validData['title'];

        //update authors
        if ($req->has('authors')) {
            $book->authors()->sync($validData['authors']);
        }

        //save book
        $book->save();

        return response()->json(['status' => 'ok']);
    }
}
