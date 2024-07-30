<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BorrowBookResource;
use App\Models\BorrowRecord;
use Illuminate\Http\Request;

class BorrowRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowRecord = BorrowRecord::list();
        $borrowRecord = BorrowBookResource::collection($borrowRecord);
        return response()->json(
            [
                'success' => true,
                'borrowRecord' => $borrowRecord
            ]
        );
    }
    // query borrow date to show users and book
    public function getBorrowByDate(Request $request)
    {
        $borrowDate = $request->input('borrow_date');

        $borrowRecord = BorrowRecord::whereRaw('CHAR_LENGTH(borrow_date) = ?', [strlen($borrowDate)])->get();        $borrowRecord = BorrowBookResource::collection($borrowRecord);
        return response()->json(
            [
                'success' => true,
                'borrowRecord' => $borrowRecord
            ]
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $borrowBook = BorrowRecord::store($request);
        if (!$borrowBook) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Can't create the borrowBook"
                ]
            );
        }

        return response()->json(
            [
                'success' => true,
                'message' => "created borrowBook successfully"
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
        $borrowBook = BorrowRecord::find($id);
        if (!$borrowBook) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Can't create the borrowBook" . $id
                ]
            );
        }
        $borrowBook->store($request, $id);
        return response()->json(
            [
                'success' => true,
                'message' => "created borrowBook successfully"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrowBook = BorrowRecord::find($id);
        if (!$borrowBook) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Can't delete the borrowBook ID " . $id
                ]
            );
        }

        $borrowBook->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "deleted borrowBook successfully with ID " . $id
            ]
        );
    }
}
