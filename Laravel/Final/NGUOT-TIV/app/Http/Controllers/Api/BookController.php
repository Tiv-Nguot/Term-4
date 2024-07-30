<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookHasBorrowedResource;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::list();
        $books = BookResource::collection($books);
        return response()->json(
            [
                'success' => true,
                'books' => $books
            ]
        );
    }

    public function borrowed()
    {
        $books = Book::BookHasBorrowed();
        $books = BookHasBorrowedResource::collection($books);
        return response()->json(
            [
                'success' => true,
                'books' => $books
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = Book::store($request);
        if (!$book) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Can't create the book"
                ]
            );
        }

        return response()->json(
            [
                'success' => true,
                'message' => "created book successfully"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Can't update the book" . $id
                ]
            );
        }
        $book->store($request, $id);
        return response()->json(
            [
                'success' => true,
                'message' => "Book updated successfully"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Can't delete the book ID " . $id
                ]
            );
        }

        $book->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "deleted book successfully with ID " . $id
            ]
        );
    }
}
